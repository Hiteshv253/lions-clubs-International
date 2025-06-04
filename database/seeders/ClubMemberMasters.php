<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MemberMaster;

class ClubMemberMasters extends Seeder {

      /**
       * Run the database seeds.
       */
      public function run(): void {
            MemberMaster::factory(50)->create();

      }
}
