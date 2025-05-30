<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;



class LoginController extends Controller {

      public function index() {
            return view('pages.auth.auth-signin-basic');
      }

      /**
       * Handle an authentication attempt.
       */
      public function authenticate(Request $request): RedirectResponse {
            $credentials = $request->validate([
                      'email' => ['required', 'email'],
                      'password' => ['required'],
            ]);

            $remember = $request->input('remember_me');

            if (Auth::attempt($credentials, $remember)) {
                  DB::table('sessions')
                        ->where('user_id', Auth::id())
                        ->delete();
                  Session::put('user_id', Auth::id());
                  $request->session()->regenerate();

                  return redirect()->intended('/lions/dashboard-ecommerce');
            }

            if (Auth::viaRemember()) {
                  return redirect()->intended('/lions/dashboard-ecommerce');
            }

            return back()->with('error', 'The provided credentials do not match our records.');
      }
}
