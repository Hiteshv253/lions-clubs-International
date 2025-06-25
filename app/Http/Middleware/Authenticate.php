<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Closure;

class Authenticate extends Middleware {

      /**
       * Redirect to login if unauthenticated.
       */
      protected function redirectTo(Request $request): ?string {
            return $request->expectsJson() ? null : route('login');
      }

      public function handle($request, Closure $next, ...$guards) {
            // Call the original authentication logic
            $response = parent::handle($request, $next, ...$guards);

            // Then track the authenticated user's session
            if (Auth::check()) {
                  DB::table('sessions')
                        ->where('id', Session::getId())
                        ->update(['user_id' => Auth::id()]);
            }

            return $response;
      }
}
