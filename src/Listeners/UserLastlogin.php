<?php

namespace Laravel\Loggeduser\Listeners;

use Carbon\Carbon;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use function PHPUnit\Framework\isNull;

class UserLastlogin
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        // $this->request = $request;
    }


    /**
     * Handle the event.
     *
     * @param  \App\Events\Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        // $event->user->update([
        //     'last_login_at' => Carbon::now(),
        // ]);

        DB::table('user_access_details')->orderByDesc('login_at')->limit(1)
            ->where('user_id',$event->user->id)
            ->whereNull('logout_at')
            ->update([
                'logout_at'=>Carbon::now(),
            ]);

        DB::table('user_access_details')->insert([
                'user_id' =>$event->user->id,
                'ip_address' =>Request::getClientIp(),
                'login_at' =>Carbon::now(),
            ]);

    }
}
