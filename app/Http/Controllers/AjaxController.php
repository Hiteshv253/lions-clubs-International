<?php

namespace App\Http\Controllers;

use App\Models\Zone;
use App\Models\Club;

class AjaxController extends Controller {

      public function getZones($region_id) {
            $zones = Zone::where('region_id', $region_id)->pluck('name', 'id');
            return response()->json($zones);
      }

      public function getClubs($zone_id) {
            $clubs = Club::where('zone_id', $zone_id)->pluck('name', 'id');
            return response()->json($clubs);
      }
}
