<?php

namespace Database\Seeders;

use App\Models\EventRegistration;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class EventRegistrationSeeder extends Seeder {

      public function run(): void {
            $faker = Faker::create();
            $eventIds = \App\Models\EventMaster::pluck('id'); // Assumes EventMaster already seeded
            $user_Id = \App\Models\User::pluck('id'); // Assumes EventMaster already seeded

            foreach (range(1, 10) as $i) {

                  $numberOfPersons = $faker->numberBetween(1, 5);
                  $eventId = $faker->randomElement($eventIds);
                  $event = \App\Models\EventMaster::find($eventId);

                  $totalAmount = $event->total_amount * $numberOfPersons;

                  EventRegistration::create([
                            'name' => $faker->name,
                            'email' => $faker->unique()->safeEmail,
                            'contact_number' => $faker->phoneNumber,
                            'event_id' => $eventId,
                            'user_id' => $user_Id,
                            'number_of_persons' => $numberOfPersons,
                            'calculated_total' => $totalAmount,
                            'event_qr_code' => 'https://picsum.photos/640/480?random=' . rand(1, 1000),
                            'event_qr_code_path' => $faker->name,
                  ]);
            }
      }
}
