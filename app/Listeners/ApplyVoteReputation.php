<?php

namespace App\Listeners;

use App\Events\VotedEvent;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ApplyVoteReputation
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
     * @param  \App\Events\VotedEvent  $event
     * @return void
     */
    public function handle(VotedEvent $event)
    {
        $objectUser = User::find($event->vote->object_user_id);
        if($event->vote->vote_type == 15){
            //downvote
            $objectUser->usr_reputation = $objectUser->usr_reputation - 3;
        }else{
            //upvote
            $objectUser->usr_reputation = $objectUser->usr_reputation + 5;
        }
        $objectUser->save();
    }
}
