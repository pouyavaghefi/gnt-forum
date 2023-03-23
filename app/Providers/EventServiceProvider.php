<?php

namespace App\Providers;

use App\Events\AnsweredEvent;
use App\Events\BestAnswerEvent;
use App\Events\LoginLogged;
use App\Listeners\AddBestAnswerReputation;
use App\Listeners\ApplyVoteReputation;
use App\Listeners\LogSaver;
use App\Listeners\SendAnswerNotification;
use App\Listeners\SendBestAnswerNotification;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Events\RegisterNewUserEvent;
use App\Listeners\MakeNewUserRecord;
use App\Events\VotedEvent;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        RegisterNewUserEvent::class => [
            MakeNewUserRecord::class,
        ],
        LoginLogged::class => [
            LogSaver::class,
        ],
        AnsweredEvent::class => [
            SendAnswerNotification::class,
        ],
        VotedEvent::class => [
            ApplyVoteReputation::class,
        ],
        BestAnswerEvent::class => [
            SendBestAnswerNotification::class,
            AddBestAnswerReputation::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
