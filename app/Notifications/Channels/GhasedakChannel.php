<?php


namespace App\Notifications\Channels;


use Ghasedak\Exceptions\ApiException;
use Ghasedak\Exceptions\HttpException;
use Illuminate\Notifications\Notification;
use Ghasedak\GhasedakApi;

class GhasedakChannel
{
    public function send($notifiable , Notification $notification)
    {
        if(! method_exists($notification , 'toGhasedakSms')) {
            throw new \Exception('toGhasedakSms not found');
        }

        $data = $notification->toGhasedakOTP($notifiable);

        $code = $data['code'];
        $receptor = $data['number'];

        $apiKey = config('services.ghasedak.key');
        $verify_template = config('services.ghasedak.verify_template');
        try{
            $api = new GhasedakApi($apiKey);
            $api->setVerifyType(GhasedakApi::VERIFY_TEXT_TYPE)->Verify(
                $receptor,
                $verify_template,
                $code);
        }
        catch(\Ghasedak\Exceptions\ApiException $e){
            echo $e->errorMessage();
        }
        catch(\Ghasedak\Exceptions\HttpException $e){
            echo $e->errorMessage();
        }
    }
}
