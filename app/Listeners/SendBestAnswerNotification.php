<?php

namespace App\Listeners;

use App\Events\BestAnswerEvent;
use App\Models\Question;
use App\Notifications\BestAnswerNotification;
use App\Notifications\NewAnswerNotifiation;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Notification;

class SendBestAnswerNotification
{
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(BestAnswerEvent $event)
    {
        $bestAnswerCreator = $event->answer->user;
        Notification::send($bestAnswerCreator,new BestAnswerNotification($event->answer));
    }
}
