<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClubFactory extends Factory {

      public function definition(): array {
            return [
                      'account_name' => $this->faker->company,
                      'type' => 'Lions Club',
                      'parent_account' => 'District ' . $this->faker->randomElement(['324A M', '324B', '325C']),
                      'district' => $this->faker->randomElement(['324A M', '324B', '325C']),
                      'region_zone' => $this->faker->randomDigitNotNull(),
                      'lion_id' => $this->faker->numerify('######'),
                      'charter_established_date' => $this->faker->date(),
                      'active_member_count' => $this->faker->numberBetween(10, 50),
                      'club_specialty' => $this->faker->word,
                      'club_sub_specialty' => $this->faker->word,
                      'specialty_description' => $this->faker->sentence,
                      'description' => $this->faker->paragraph,
                      'website' => $this->faker->url,
                      // Meeting Location 1
                      'meeting_place' => $this->faker->company,
                      'meeting_week' => $this->faker->randomElement(['1st', '2nd', '3rd', '4th']),
                      'meeting_day' => $this->faker->dayOfWeek,
                      'meeting_time' => $this->faker->time(),
                      'meeting_street' => $this->faker->streetAddress,
                      'meeting_city' => $this->faker->city,
                      'meeting_state' => $this->faker->state,
                      'meeting_zip' => $this->faker->postcode,
                      'meeting_country' => $this->faker->country,
                      'meeting_local_place' => $this->faker->company,
                      'meeting_local_street' => $this->faker->streetName,
                      'meeting_local_city' => $this->faker->city,
                      'meeting_local_zip' => $this->faker->postcode,
                      'meeting_local_state' => $this->faker->state,
                      'meeting_local_country' => $this->faker->country,
                      'online_meeting_1' => $this->faker->boolean,
                      'online_meeting_1_place' => $this->faker->company,
                      'online_meeting_1_address' => $this->faker->url,
                      // Meeting Location 2
                      'meeting2_place' => $this->faker->company,
                      'meeting2_week' => $this->faker->randomElement(['1st', '2nd', '3rd', '4th']),
                      'meeting2_day' => $this->faker->dayOfWeek,
                      'meeting2_time' => $this->faker->time(),
                      'meeting2_street' => $this->faker->streetAddress,
                      'meeting2_city' => $this->faker->city,
                      'meeting2_state' => $this->faker->state,
                      'meeting2_zip' => $this->faker->postcode,
                      'meeting2_country' => $this->faker->country,
                      'meeting2_local_place' => $this->faker->company,
                      'meeting2_local_street' => $this->faker->streetName,
                      'meeting2_local_city' => $this->faker->city,
                      'meeting2_local_zip' => $this->faker->postcode,
                      'meeting2_local_state' => $this->faker->state,
                      'meeting2_local_country' => $this->faker->country,
                      'online_meeting_2' => $this->faker->boolean,
                      'online_meeting_2_place' => $this->faker->company,
            ];
      }
}
