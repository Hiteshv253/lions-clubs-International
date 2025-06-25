<?php

namespace Database\Seeders;

use App\Models\Member;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ClubMemberMasters extends Seeder {

      public function run(): void {
            $faker = Faker::create();

            foreach (range(1, 50) as $index) {
                  $firstName = $faker->firstName;
                  $lastName = $faker->lastName;

                  \App\Models\MemberMaster::create([
                            'membership_id' => strtolower(substr($firstName, 0, 5) . str_pad($index, 3, '0', STR_PAD_LEFT) . substr($lastName, 4)),
                            'first_name' => $firstName,
                            'last_name' => $lastName,
                            'gender' => $faker->randomElement(['Male', 'Female', 'Other']),
                            'birthdate' => $faker->date(),
                            'address_line1' => $faker->streetAddress,
                            'address_line2' => $faker->secondaryAddress,
                            'address_line3' => $faker->citySuffix,
                            'email' => $faker->unique()->safeEmail,
                            'mobile' => $faker->phoneNumber,
                            'home_phone' => $faker->phoneNumber,
                            'zipcode' => $faker->postcode,
                            'join_date' => $faker->date(),
                            'state_id' => rand(1, 5),
                            'city_id' => rand(1, 5),
                            'region_id' => rand(1, 5),
                            'occupation_id' => rand(1, 5),
                            'account_id' => rand(1, 5),
                            'designation_id' => rand(1, 5),
                            'user_id' => rand(1, 500),
                            'parent_id' => rand(0, 100),
                            'zone_id' => rand(1, 10),
                            'club_id' => rand(1, 15),
                            'is_active' => rand(0, 1),
                  ]);
            }
      }
}
