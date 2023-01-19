<?php

namespace Laravel\Loggeduser;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{

        protected $listen = [

            \Illuminate\Auth\Events\Login::class => [
                \Laravel\Loggeduser\Listeners\UserLastlogin::class,
            ],
            \Illuminate\Auth\Events\Logout::class => [
                \Laravel\Loggeduser\Listeners\UserLastLogout::class,
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
}
