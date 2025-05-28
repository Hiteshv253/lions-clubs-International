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

      public function home() {
            return view('frontend.home-page.index');
      }
}
