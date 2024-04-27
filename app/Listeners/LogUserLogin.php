<?php

namespace App\Listeners;

use App\Events\UserLoggedIn;
use App\Models\UserLog;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogUserLogin
{
    use InteractsWithQueue;

    public function handle(UserLoggedIn $event)
    {
        $user = $event->user;

        // Store user log
        $userLog = new UserLog();
        $userLog->user_id = $user->id;
        $userLog->ip_address = request()->ip();
        $userLog->user_agent = request()->header('User-Agent');
        $userLog->save();
    }
}
