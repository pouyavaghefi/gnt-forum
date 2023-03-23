<?php

namespace App\Listeners;

use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AddBestAnswerReputation
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $bestAnswerCreator = User::find($event->answer->user->id);
        $bestAnswerCreator->usr_reputation = $bestAnswerCreator->usr_reputation + 15;
        $bestAnswerCreator->save();
    }
}
