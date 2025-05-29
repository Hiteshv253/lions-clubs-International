<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class TrackUserSession {

      /**
       * Create the event listener.
       */
      public function __construct() {
            //
      }

      /**
       * Handle the event.
       */
      public function handle(object $event): void {
            //
            if ($event->user) {
                  session()->put('user_id', $event->user->id);
            }
      }
}
