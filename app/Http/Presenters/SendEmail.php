<?php
namespace App\Http\Presenters;

use App\Mail\UserLoggedInInfo;
use Illuminate\Support\Facades\Mail;
use Session;
use Carbon\Carbon;

class SendEmail
{
    public $email_address;
    public $ip_address;

    public function __construct($email,$ip)
    {
        $this->email_address = $email;
        $this->ip_address = $ip;
    }

    public function loggedIn()
    {
        try{
            $date = Carbon::createFromFormat('Y-m-d H:i:s', now())->format('d-m-Y');
            $current_date = jdate($date)->format('Y-m-d');
            $details = [
                'title' => 'گزارش ورود به حساب',
                'ip' => $this->ip_address,
                'header' => 'به گویانت خوش امدید',
                'content_show' => 'اطلاعات ورود:',
                'time' => $current_date,
            ];
            Mail::to($this->email_address)->send(new UserLoggedInInfo($details));
            return redirect()->route('home.index');
        }catch(\PDOException $e){
            dd($e);
        }
    }
}
