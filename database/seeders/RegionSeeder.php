<?php

namespace Database\Seeders;

use App\Models\Region;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RegionSeeder extends Seeder {

      /**
       * Run the database seeds.
       */
      public function run(): void {
            //
            $parents = Region::factory()->count(100)->create();

            // Create child regions for each parent
            foreach ($parents as $parent) {
                  Region::factory()->count(3)->create([
                            'name' => $parent->name,
                            'parent_id' => $parent->id
                  ]);
            }
      }
}
