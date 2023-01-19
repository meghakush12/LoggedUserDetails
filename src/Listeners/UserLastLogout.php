<?php

namespace Laravel\Loggeduser\Listeners;

use Carbon\Carbon;
use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserLastLogout
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
     * @param  \App\Events\Logout  $event
     * @return void
     */
    public function handle(Logout $event)
    {

        DB::table('user_access_details')->where('user_id',$event->user->id)->where('ip_address', Request::getClientIp())
        ->orderByDesc('login_at')
        ->limit(1)
        ->update([
            'logout_at'=>Carbon::now(),
        ]);

    }
}
