<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class LogoutOtherDevices {

      public function handle(Login $event): void {
            $user = $event->user;
            $currentSessionId = Session::getId();

            DB::table('sessions')
                  ->where('user_id', $user->id)
                  ->where('id', '!=', $currentSessionId)
                  ->delete();
      }
}
