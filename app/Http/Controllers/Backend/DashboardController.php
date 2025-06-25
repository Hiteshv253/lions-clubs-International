<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MemberMaster;

class DashboardController extends Controller {

      //
      public function dashboard() {
            $activeMembersCount = MemberMaster::where('is_active', 0)->count();

            return view('backend.dashboard.index', compact('activeMembersCount'));
      }
}
