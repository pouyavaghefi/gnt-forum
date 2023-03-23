<?php

namespace App\Http\Controllers\Auth;

use App\Events\LoginLogged;
use App\Events\RegisterNewUserEvent;
use App\Http\Controllers\Controller;
use App\Http\Presenters\SendEmail;
use App\Models\ActiveCode;
use App\Models\CaptchaRequest;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Support\Facades\Session;
use Mews\Captcha\Facades\Captcha;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\User;
use App\Notifications\ActiveCodeNotification;
use Auth;
use Hash;
use File;

class AuthController extends Controller
{
    public $ip;

    public function __construct()
    {
        $this->ip = \Request::ip();
    }

    public function register(Request $request)
    {
        $captcha = app('App\Http\HelperClasses\Captcha')->make();

        //Session::put('thecaptchacode',$captcha[1]);

        return view('frontend.auth.register', compact('captcha'))->with('ip',$this->ip);
    }

    public function registerNew(RegisterRequest $request)
    {
        if($request->rules == "on")
        {
            if(!empty($request->ccode))
            {
                if($this->checkRequestedCap())
                {
                    $this->deleteRequestedCap();

                    $data = $request->validated();

                    event(new RegisterNewUserEvent($data));

                    $user = User::where('usr_mobile_phone', $request->phone)->firstOrFail();

                    $request->session()->flash('auth' , [
                        'user_id' => $user->id,
                        'using_sms' => true,
                    ]);

                    $code = ActiveCode::generateCode($user);

                    $user->notify(new ActiveCodeNotification($code,$user->usr_mobile_phone));

                    return redirect(route('auth.2fa'));
                }
                else
                {
                    return redirect()->back()->withErrors('کد کپچای وارد شده صحیح نیست');
                }
            }
            else
            {
                return redirect()->back()->withErrors('کد کپچا وارد نشده است');
            }
        }
        else
        {
            return redirect()->back()->withErrors('برای ادامه فرایند ثبت نام بایستی قوانین و مقررات سایت را قبول کنید...');
        }
    }

    public function login(Request $request)
    {
        if (request()->isMethod('post')) {
            if(is_numeric($request->get('userinput'))){
                // phone number

                $request->validate([
                    'userinput' => 'required|regex:/^09\d{9}$/|max:11|min:11',
                ],[
                    'userinput.required' => 'وارد کردن این فیلد اجباری است',
                    'userinput.regex' => 'شماره وارد شده معتبر نیست',
                    'userinput.max' => 'شماره وارد شده معتبر نیست',
                    'userinput.min' => 'شماره وارد شده معتبر نیست',
                ]);

                $findUser = User::where('usr_mobile_phone',$request->userinput)->first();

                if($findUser){
                    Session::put('nextStep',1);
                    Session::put('loggedType','mobile');
                    Session::put('foundUser',$findUser->usr_mobile_phone);
                    Session::put('userData',$findUser);
                    !empty($findUser->usr_password_hash) ? Session::put('passHash',1) : Session::put('passHash',0);
                    return redirect()->route('auth.login.next');
                }else{
                    return redirect()->back()->withErrors('این شماره در دیتابیس ثبت نشده است');
                }

            }elseif (filter_var($request->get('userinput'), FILTER_VALIDATE_EMAIL)) {
                // email address

                $validatedEmail = $request->validate([
                    'user_input' => 'required|regex:/(.+)@(.+)\.(.+)/i|max:125|min:3',
                ],[
                    'userinput.required' => 'وارد کردن این فیلد اجباری است',
                    'userinput.regex' => 'ایمیل وارد شده معتبر نیست',
                    'userinput.max' => 'ایمیل وارد شده معتبر نیست',
                    'userinput.min' => 'ایمیل وارد شده معتبر نیست',
                ]);

                $findUser = User::where('usr_email_address',$request->userinput)->first();

                if($findUser){
                    Session::put('nextStep',1);
                    Session::put('loggedType','email');
                    Session::put('foundUser',$findUser->usr_email_address);
                    Session::put('userData',$findUser);
                    !empty($findUser->usr_password_hash) ? Session::put('passHash',1) : Session::put('passHash',0);
                    return redirect()->route('auth.login.next');
                }else{
                    return redirect()->back()->withErrors('این ایمیل در دیتابیس ثبت نشده است');
                }

            }else{
                // user name

                $validatedUsername = $request->validate([
                    'userinput' => 'required|regex:/^[a-zA-Z0-9_.-]*$/i|max:125|min:3',
                ],[
                    'userinput.required' => 'وارد کردن این فیلد اجباری است',
                    'userinput.exists' => 'نام کاربری وارد شده در دیتابیس یافت نشد',
                    'userinput.regex' => 'نام کاربری وارد شده معتبر نیست',
                    'userinput.max' => 'نام کاربری وارد شده معتبر نیست',
                    'userinput.min' => 'نام کاربری وارد شده معتبر نیست',
                ]);


                $findUser = User::where('usr_user_name',trim($request->userinput))->first();

                if($findUser){
                    Session::put('nextStep',1);
                    Session::put('loggedType','username');
                    Session::put('foundUser',$findUser->usr_user_name);
                    Session::put('userData',$findUser);
                    !empty($findUser->usr_password_hash) ? Session::put('passHash',1) : Session::put('passHash',0);
                    return redirect()->route('auth.login.next');
                }else{
                    return redirect()->back()->withErrors('این نام کاربری در دیتابیس ثبت نشده است');
                }
            }
        }else{
            if(Session::has('nextStep')){
                return redirect()->route('auth.login.next');
            }else{
                return view('frontend.auth.login');
            }
        }
    }

    public function loginNext(Request $request)
    {
        $request->session()->reflash();

        if(Session::has('nextStep')){
            return view('frontend.auth.next');
        }else{
            abort(404);
        }
    }

    public function signInWithPassword()
    {
        if(Session::has('nextStep')) {
            return view('frontend.auth.passwd');
        }else{
            abort(404);
        }
    }

    public function signInWithPasswordProcess(Request $request)
    {
        $data = $request->validate([
            'userinput' => 'required|max:16|min:8'
        ],[
            'userinput.min' => 'رمز عبور وارد شده بایستی حداقل ۸ حرف باشد',
            'userinput.max' => 'رمز عبور وارد شده حداکثر میتواند ۱۶ حرف باشد',
        ]);
        $userSession = Session::get('userData');
        $user = User::find($userSession->id);
        if(!Hash::check($data['userinput'], $user->usr_password_hash)){
            Session::put('wrongPass',1);
            return redirect()->back()->withErrors('رمز عبور وارد شده صحیح نمی باشد');
        }else{
            Auth::login($user);
            $this->forgetThePast();
            User::submitLastLogin($user);
            event(new LoginLogged($request, $user));
            if(!empty($user->usr_email_address)){
                $sendMail = new SendEmail($user->usr_email_address,$this->ip);
                return $sendMail->loggedIn();
            }
            return redirect()->route('home.index');
        }
    }

    public function signInWithToken($e = null)
    {
            if (Session::has('nextStep') && Session::has('foundUser')) {
                if(Session::get('loggedType') == "mobile"){
                    $field = "usr_mobile_phone";
                }elseif(Session::get('loggedType') == "email"){
                    $field = "usr_email_address";
                }else{
                    $field = "usr_user_name";
                }
                $user = User::where($field, Session::get('foundUser'))->first();
                if(!empty($e)){
                    $user->activeCode()->delete();
                    Session::forget('codeSent');
                    return $this->signInWithToken();
                }else {
                    if (Session::has('codeSent')) {
                        $nowTime = now();
                        $sentTime = Session::get('codeSent');
                        $diffedTimeScnds = $nowTime->diffInSeconds($sentTime); // difference time
                        $diffedTimeMints = $nowTime->diffInMinutes($sentTime);

                        return view('frontend.auth.token_log', compact('diffedTimeScnds', 'diffedTimeMints'));
                    } else {
                        $code = ActiveCode::generateCode($user);
                        $user->notify(new ActiveCodeNotification($code, $user->usr_mobile_phone));

                        Session::put('codeSent', now()->addMinutes(10));

                        return redirect()->route('auth.login.next.token');
                    }
                }

            } else {
                abort(404);
            }
    }

    public function checkRequestedCap()
    {
        $requestedCap = CaptchaRequest::where('cap_requested_ip',$this->ip)->first();
        return $requestedCap;
    }

    public function deleteRequestedCap()
    {
        $requestedCap = CaptchaRequest::where('cap_requested_ip',$this->ip)->first();
        return $requestedCap->delete();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }

    public function forgetThePast()
    {
        $forgetPast = new \App\Http\Controllers\Auth\ToolsController();
        $forgetPast->destroySessions();
    }
}
