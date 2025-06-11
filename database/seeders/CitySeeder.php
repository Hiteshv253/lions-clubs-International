<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\City;
use App\Models\State;

class CitySeeder extends Seeder {

      /**
       * Run the database seeds.
       */
      public function run() {
            State::all()->each(function ($state) {
                  City::factory()->count(10)->create(['state_id' => $state->id]);
            });
      }
}
