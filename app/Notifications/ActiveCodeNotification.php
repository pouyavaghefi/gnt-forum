<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use App\Notifications\Channels\GhasedakChannel;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ActiveCodeNotification extends Notification
{
    use Queueable;

    public $code;

    public $phoneNumber;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($code , $phoneNumber)
    {
        $this->code = $code;
        $this->phoneNumber = $phoneNumber;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [GhasedakChannel::class];
    }


    public function toGhasedakSms($notifiable)
    {
        return [
            'text' => "کد احرازهویت {$this->code} \n انجمن برنامه نویسی گویانت",
            'number' => $this->phoneNumber
        ];
    }

    public function toGhasedakOTP($notifiable)
    {
        return [
            'code'=>$this->code,
            'number' => $this->phoneNumber
        ];
    }
}
