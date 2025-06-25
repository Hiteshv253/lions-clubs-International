<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\MemberMaster;

class LoginController extends Controller {

      public function index() {
            return view('pages.auth.auth-signin-basic');
      }

      /**
       * Handle an authentication attempt.
       */
      function authenticate(Request $request): RedirectResponse {
            $credentials = $request->validate([
                      'email' => ['required', 'email'],
                      'password' => ['required'],
            ]);

            $remember = $request->boolean('remember_me');

            $user = \App\Models\User::where('email', $request->email)->first();

            // Step 1: Check user exists and is active
            if (!$user || !\Hash::check($request->password, $user->password)) {
                  return back()->with('error', 'Invalid credentials.');
            }

            if ($user->is_active == 1) {
                  return back()->with('error', 'Your account is deactivated. Please contact admin.');
            }

            // Step 2: Check for existing active session
            $existingSession = DB::table('sessions')
                  ->where('user_id', $user->id)
                  ->where('last_activity', '>', now()->subMinutes(config('session.lifetime'))->timestamp)
                  ->first();

            if ($existingSession) {
                  return back()->with('error', 'You are already logged in on another device.');
            }

            // Step 3: Proceed with login
            if (Auth::attempt($credentials, $remember)) {
                  $request->session()->regenerate();

                  // Logout other devices (this will usually do nothing since we blocked above)

                  DB::table('sessions')->updateOrInsert(
                        ['id' => Session::getId()],
                        [
                                  'user_id' => Auth::id(),
                                  'ip_address' => request()->ip(),
                                  'user_agent' => request()->userAgent(),
                                  'payload' => base64_encode(serialize([])), // minimal payload
                                  'last_activity' => now()->timestamp,
                        ]
                  );

                  $user->update(['last_login_at' => now()]);
                  MemberMaster::where('user_id', $user->id)->update(['last_login_at' => now()]);
                  Auth::logoutOtherDevices($request->input('password'));

                  // Redirect based on role
                  return match ($user->getRoleNames()->first()) {
                        'super-admin' => redirect()->intended('/lions/dashboard'),
                        'admin' => redirect()->intended('/admin/dashboard'),
                        'member' => redirect()->intended('/members/dashboard'),
                        default => redirect('/login')->with('error', 'Access denied. Invalid role.')
                  };
            }

            return back()->with('error', 'Login failed.');
      }
}
