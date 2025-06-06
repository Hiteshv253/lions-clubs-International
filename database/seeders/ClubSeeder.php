<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Club;

class ClubSeeder extends Seeder {

      /**
       * Run the database seeds.
       */
      public function run(): void {
            //
            \App\Models\Club::factory()->count(1000)->create();
      }
}
