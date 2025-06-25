<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FooterMessage;

class FooterMessageSeeder extends Seeder {

      /**
       * Run the database seeds.
       */
      public function run(): void {
            FooterMessage::factory()->count(50)->create();
      }
}
