<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class StoreUserIdInSession {

      /**
       * Create the event listener.
       */
      public function __construct() {
            //
      }

      /**
       * Handle the event.
       */
      public function handle(Login $event) {
            // Update the sessions table with the current user's ID
            DB::table('sessions')
                  ->where('id', Session::getId())
                  ->update(['user_id' => $event->user->id]);
      }
}
