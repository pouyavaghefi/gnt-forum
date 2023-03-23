<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ActiveCode;
use Illuminate\Support\Facades\Session;

class TokenController extends Controller
{
    public function getToken(Request $request)
    {
        if(!$request->session()->has('auth')){
            return redirect(route('auth.register'));
        }

        $request->session()->reflash();

        return view('frontend.auth.token_reg');
    }

    public function verifyToken(Request $request)
    {
        $request->validate([
            'token' => 'required'
        ]);

        if(!$request->session()->has('auth')){
            return redirect(route('auth.register'));
        }

        $user = User::findOrFail($request->session()->get('auth.user_id'));

        $status = ActiveCode::verifyCode($request->token,$user);

        if(!$status){
            alert()->error('کد صحیح نبود');
            return redirect(request()->url());
        }

        User::submitMobileVerified($user);
        User::submitLastLogin($user);

        if(auth()->loginUsingId($user->id)){
            Session::flash('welcome','ورود شما را به گویانت خوش آمد میگوییم');
            $user->activeCode()->delete();
            return redirect('/');
        }

        return redirect(route('auth.register'));
    }

    public function signInWithTokenProcess(Request $request)
    {
        $request->validate([
            'token' => 'required'
        ]);

        if(Session::get('loggedType') == "mobile"){
            $field = "usr_mobile_phone";
        }elseif(Session::get('loggedType') == "email"){
            $field = "usr_email_address";
        }else{
            $field = "usr_user_name";
        }

        $user = User::where($field,Session::get('foundUser'))->first();

        $status = ActiveCode::verifyCode($request->token,$user);

        if(!$status){
            alert()->error('کد صحیح نبود');
            return redirect(request()->url());
        }

        if(auth()->loginUsingId($user->id)){
            $this->forgetThePast();
            $user->activeCode()->delete();
            return redirect()->route('home.index');
        }
    }

    public function forgetThePast()
    {
        $forgetPast = new \App\Http\Controllers\Auth\ToolsController();
        $forgetPast->destroySessions();
    }
}
