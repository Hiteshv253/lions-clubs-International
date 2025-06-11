<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Club;
use App\Models\Zone;

class ClubSeeder extends Seeder {

      /**
       * Run the database seeds.
       */
      public function run(): void {
            //
            Zone::all()->each(function ($zone) {
                  Club::factory(4)->create([
                            'zone_id' => $zone->id,
                  ]);
            });
      }
}
