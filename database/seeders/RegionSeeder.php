<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\District;
use App\Models\Region;

class RegionSeeder extends Seeder {

      /**
       * Run the database seeds.
       */
      public function run(): void {
            District::all()->each(function ($district) {
                  Region::factory(10)->create([
                            'district_id' => $district->id,
                  ]);
            });
      }
}
