<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\EventRegistration;
use App\Models\FooterMessage;
use App\Models\MemberMaster;
use App\Models\Region;
use App\Models\Account;
use App\Models\City;
use App\Models\Zone;
use App\Models\State;
use App\Models\ZipCode;
use App\Models\Occupation;
use App\Models\EventMaster;
use App\Models\Club;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller {

      public function profile_our_member(Request $request) {
            $member = auth()->user(); // currently logged-in member
            $members = MemberMaster::where('is_active', 0)->latest()->take(10)->get(); // active members, limit 10


            return view('frontend.member_dashboard.my-profile.members', compact('member', 'members'));
      }

      public function profile_dashboard(Request $request) {

            $userId = Auth::id();
            $eventCount = EventRegistration::where('user_id', $userId)->count();
            $member = MemberMaster::select('*')->where('user_id', Auth::id())->first();
            return view('frontend.member_dashboard.my-profile.dashboard', compact('member', 'eventCount'));
      }

      public function profile_events() {


            $member = auth()->user(); // Or auth()->guard('member')->user() if using custom guard

            $events = $member->events()->latest()->take(5)->get(); // latest 5 events

            return view('frontend.member_dashboard.my-profile.events', compact('member', 'events'));
      }

      public function profile_view(Request $request) {
            $regions = Region::select('name', 'id')->distinct()->get();
            $accounts = Account::select('name', 'code', 'id')->distinct()->get();
            $citys = City::select('name', 'id')->distinct()->get();
            $states = State::select('name', 'id')->distinct()->get();
            $occupations = Occupation::select('name', 'id')->distinct()->get();
            $ZipCodes = ZipCode::select('zip_code', 'id')->distinct()->get();
            $member = MemberMaster::select('*')->where('user_id', Auth::id())->first();
            return view('frontend.member_dashboard.my-profile.profile', compact('member', 'regions', 'accounts', 'citys', 'states', 'occupations', 'ZipCodes'));
      }
}
