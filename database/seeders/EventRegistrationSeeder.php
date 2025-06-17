<?php

namespace Database\Seeders;

use App\Models\EventRegistration;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class EventRegistrationSeeder extends Seeder {

      public function run(): void {
            $faker = Faker::create();

            foreach (range(1, 50) as $i) {
                  EventRegistration::create([
                            'name' => $faker->name,
                            'email' => $faker->unique()->safeEmail,
                            'contact_number' => $faker->phoneNumber,
                            'event_id' => rand(1, 5), // assuming event IDs from 1 to 5 exist
                            'event_qr_code' => 'https://picsum.photos/640/480?random=' . rand(1, 1000),
                            'event_qr_code_path' => $faker->name,
                  ]);
            }
      }
}
