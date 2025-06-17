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
      public function authenticate(Request $request): RedirectResponse {
            $credentials = $request->validate([
                      'email' => ['required', 'email'],
                      'password' => ['required'],
            ]);

            $remember = $request->boolean('remember_me');

            if (Auth::attempt($credentials, $remember)) {
                  $request->session()->regenerate();

                  $userId = Auth::id();
                  $currentSessionId = Session::getId();

                  DB::table('sessions')
                        ->where('user_id', $userId)
                        ->where('id', '!=', $currentSessionId)
                        ->delete();

                  DB::table('sessions')
                        ->where('id', $currentSessionId)
                        ->update(['user_id' => $userId]);

                  // ✅ Update last login
                  Auth::user()->update([
                            'last_login_at' => now(),
                  ]);

                  $member = MemberMaster::where('user_id', '=', $userId);
                  $member->update([
                            'last_login_at' => now(),
                  ]);
//                  dd(Auth::user(), Session::getId(), now(), $member);

                  return redirect()->intended('/lions/dashboard');
            }

            return back()->with('error', 'The provided credentials do not match our records.');
      }
}

//
//public function authenticate(Request $request): RedirectResponse
//{
//    $request->validate([
//        'login' => ['required'], // could be email or membership_id
//        'password' => ['required'],
//    ]);
//
//    $loginInput = $request->input('login');
//    $remember = $request->boolean('remember_me');
//
//    // Determine if the input is an email
//    $fieldType = filter_var($loginInput, FILTER_VALIDATE_EMAIL) ? 'email' : 'membership_id';
//
//    $credentials = [
//        $fieldType => $loginInput,
//        'password' => $request->input('password'),
//    ];
//
//    if (Auth::attempt($credentials, $remember)) {
//        $request->session()->regenerate();
//
//        $userId = Auth::id();
//        $currentSessionId = Session::getId();
//
//        DB::table('sessions')
//            ->where('user_id', $userId)
//            ->where('id', '!=', $currentSessionId)
//            ->delete();
//
//        DB::table('sessions')
//            ->where('id', $currentSessionId)
//            ->update(['user_id' => $userId]);
//
//        return redirect()->intended('/lions/dashboard');
//    }
//
//    return back()->with('error', 'The provided credentials do not match our records.');
//}
