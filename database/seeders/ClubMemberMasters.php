<?php

namespace Database\Seeders;

use App\Models\Member;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ClubMemberMasters extends Seeder {

      public function run(): void {
            $faker = Faker::create();

            foreach (range(1, 50) as $index) {
                  \App\Models\MemberMaster::create([
                            'member_id' => 'MEM' . str_pad($index, 4, '0', STR_PAD_LEFT),
                            'account_name' => $faker->company,
                            'first_name' => $faker->firstName,
                            'last_name' => $faker->lastName,
                            'gender' => $faker->randomElement(['Male', 'Female', 'Other']),
                            'birthdate' => $faker->date(),
                            'address_line1' => $faker->streetAddress,
                            'address_line2' => $faker->secondaryAddress,
                            'address_line3' => $faker->citySuffix,
                            'email' => $faker->unique()->safeEmail,
                            'mobile' => $faker->phoneNumber,
                            'home_phone' => $faker->phoneNumber,
                            'state' => rand(1, 5), // Update with actual state IDs
                            'city' => $faker->city,
                            'zipcode' => $faker->postcode,
                            'occupation' => rand(1, 10), // Update with real occupation IDs
                            'join_date' => $faker->date(),
                            'is_active' => $faker->boolean,
                            'region_id' => rand(1, 5),
                            'zone_id' => rand(1, 10),
                            'club_id' => rand(1, 15),
                  ]);
            }
      }
}
