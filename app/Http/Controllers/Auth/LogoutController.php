<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class LogoutController extends Controller {

      public function logout(Request $request): RedirectResponse {
            // Remove session from DB
            DB::table('sessions')->where('id', Session::getId())->delete();

            // Perform logout
            Auth::logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return redirect('/');
      }
}
