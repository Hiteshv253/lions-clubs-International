<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\District;

class DistrictSeeder extends Seeder {

      /**
       * Run the database seeds.
       */
      public function run(): void {
            //
            District::create(['name' => 'Ahmedabad', 'state_id' => 1]);
            District::create(['name' => 'Surat', 'state_id' => 1]);
      }
}
