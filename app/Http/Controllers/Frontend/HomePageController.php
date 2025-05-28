<?php

// app/Http/Controllers/Frontend/HomePageController.php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class HomePageController extends Controller {

      public function home1() {
            return view('frontend.home_page.index');
      }

      public function about() {
            return view('frontend.about_page.index');
      }

      public function service() {
            return view('frontend.service_page.index');
      }

      public function contact() {
            return view('frontend.contact_page.index');
      }
}
