<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\EventMaster;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventMasterSeeder extends Seeder {

      /**
       * Run the database seeds.
       */
      public function run(): void {
            //
            EventMaster::factory(100)->create();
      }
}
