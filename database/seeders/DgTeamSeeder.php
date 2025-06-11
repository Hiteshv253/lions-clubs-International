<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DgTeam;  // Make sure your model is named DgTeam

class DgTeamSeeder extends Seeder {

      public function run(): void {

            DgTeam::factory(10)->create();
      }
}
