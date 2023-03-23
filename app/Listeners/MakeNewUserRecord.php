<?php

namespace App\Listeners;

use App\Events\RegisterNewUserEvent;
use App\Models\Member;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class MakeNewUserRecord implements ShouldQueue
{
    /**
     * Handle the event.
     *
     * @param  \App\Events\RegisterNewUserEvent  $event
     * @return void
     */
    public function handle(RegisterNewUserEvent $event)
    {
        $firstName = $event->data['fname'];
        $lastName = $event->data['lname'];
        $userName = $event->data['uname'];
        $mobilePhone = $event->data['phone'];
        $hashPassword = Hash::make($event->data['password']);
        $randomString = Str::random(20);

        $user = User::create([
            'usr_first_name' => $firstName,
            'usr_last_name' => $lastName,
            'usr_user_name' => $userName,
            'usr_mobile_phone' => $mobilePhone,
            'usr_password_hash' => $hashPassword,
            'usr_str' => $randomString,
        ]);

        Member::create([
            'mbr_usr_id' => $user->id,
            'mbr_type_id' => 7,
        ]);
    }
}
