<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\District;
use App\Models\Region;
use App\Models\Zone;
use App\Models\Club;

class DatabaseSeeder extends Seeder {

      /**
       * Seed the application's database.
       */
      public function run(): void {



            \App\Models\User::factory(50)->create();
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
                      RegionSeeder::class,
                      SponsorSeeder::class,
                      ServiceActivityTypeSeeder::class,
                      EventRegistrationSeeder::class,
                      FooterMessageSeeder::class
            ]);

            District::factory(5)->create()->each(function ($district) {
                  Region::factory(3)->create([
                            'district_id' => $district->id,
                  ])->each(function ($region) {
                        Zone::factory(2)->create([
                                  'region_id' => $region->id,
                        ])->each(function ($zone) {
                              Club::factory(4)->create([
                                        'zone_id' => $zone->id, // ✅ REQUIRED HERE
                              ]);
                        });
                  });
            });

//            \App\Models\User::factory()->create([
//                      'first_name' => 'Hitesh',
//                      'last_name' => 'kumar',
//                      'email' => 'hiteshv253@gmail.com',
//            ]);
      }
}
