<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ServiceActivityType;

class ServiceActivityTypeSeeder extends Seeder {

      /**
       * Run the database seeds.
       */
      public function run(): void {
            ServiceActivityType::factory()->count(20)->create(); // Generates 20 fake records
      }
}
