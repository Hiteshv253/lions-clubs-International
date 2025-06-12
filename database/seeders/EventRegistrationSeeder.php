<?php

namespace Database\Seeders;

use App\Models\EventRegistration;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class EventRegistrationSeeder extends Seeder {

      public function run(): void {
            $faker = Faker::create();

            foreach (range(1, 20) as $i) {
                  EventRegistration::create([
                            'name' => $faker->name,
                            'email' => $faker->unique()->safeEmail,
                            'event_id' => rand(1, 5), // assuming event IDs from 1 to 5 exist
                  ]);
            }
      }
}
