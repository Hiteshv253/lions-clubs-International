<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ZipCode;
use App\Models\City;

class ZipCodeSeeder extends Seeder {

      /**
       * Run the database seeds.
       */
      public function run() {
            City::all()->each(function ($city) {
                  ZipCode::factory()->count(10)->create([
                            'city_id' => $city->id,
                            'zip_code' => fake()->postcode,
                            'is_active' => rand(0, 1),
                  ]);
            });
      }
}
