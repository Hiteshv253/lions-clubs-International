<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sponsor;

class SponsorSeeder extends Seeder {

      /**
       * Run the database seeds.
       */
      public function run(): void {
            Sponsor::factory()->count(10)->create();
      }
}
