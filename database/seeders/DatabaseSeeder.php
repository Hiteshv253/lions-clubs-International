<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

      /**
       * Seed the application's database.
       */
      public function run(): void {
            \App\Models\User::factory(500)->create();
            $this->call([
                      ClubMemberMasters::class,
                      UserRolePermissionSeeder::class,
                      EventMasterSeeder::class,
                      OccupationSeeder::class,
                      DgTeamSeeder::class,
                      StateSeeder::class,
                      CitySeeder::class,
                      ZipCodeSeeder::class,
                      ClubSeeder::class,
                      ServiceSeeder::class,
                      AccountSeeder::class,
                      RegionSeeder::class
            ]);

//            \App\Models\User::factory()->create([
//                      'first_name' => 'Hitesh',
//                      'last_name' => 'kumar',
//                      'email' => 'hiteshv253@gmail.com',
//            ]);
      }
}
