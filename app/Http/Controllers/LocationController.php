<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\State;
use App\Models\City;
use App\Models\ZipCode;

class LocationController extends Controller {

      public function showForm() {
            $states = State::all();
            return view('location.form', compact('states'));
      }

      public function getCities($state_id) {
            return City::where('state_id', $state_id)->get();
      }

      public function getZipCodes($city_id) {
            return ZipCode::where('city_id', $city_id)->get();
      }
}
