<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StateSeeder extends Seeder {

      /**
       * Run the database seeds.
       */
      public function run() {
            \App\Models\State::factory()->count(10)->create();
      }
}
