<?php

namespace App\Listeners;

use App\Events\AnsweredEvent;
use App\Models\Question;
use App\Notifications\NewAnswerNotifiation;
use Illuminate\Contracts\Queue\ShouldQueue;
use Notification;
use Illuminate\Queue\InteractsWithQueue;

class SendAnswerNotification
{
    /**
     * Handle the event.
     *
     * @param  \App\Events\AnsweredEvent  $event
     * @return void
     */
    public function handle(AnsweredEvent $event)
    {
        $queId = $event->answer->ans_que_id;
        $queStion = Question::find($queId);
        Notification::send($queStion->user,new NewAnswerNotifiation($event->answer));
    }
}
