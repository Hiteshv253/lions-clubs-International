<?php

namespace Database\Factories;

use App\Models\EventMaster;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventMasterFactory extends Factory {

      protected $model = EventMaster::class;

      public function definition(): array {
            return [
                      'event_name' => $this->faker->sentence,
                      'event_start_date' => $this->faker->dateTime,
                      'event_end_date' => $this->faker->dateTimeBetween('now', '+6 months'),
                      'description' => $this->faker->paragraph,
                      'image' => 'https://picsum.photos/640/480?random=' . rand(1, 1000),
                      'total_amount' => $this->faker->numberBetween(0, 1000),
                      'is_active' => $this->faker->numberBetween(0, 1),
                      'is_create_by' => $this->faker->numberBetween(1, 5),
                      'venue_name' => $this->faker->sentence,
                      'flag_id' => $this->faker->numberBetween(0, 1),
                      'total_event_users' => $this->faker->numberBetween(0, 100),
                      'total_registered_user' => $this->faker->numberBetween(0, 100),
                      'total_pendding_users' => $this->faker->numberBetween(0, 100),
                      'event_qr_code' => 'https://picsum.photos/640/480?random=' . rand(1, 1000),
                      'limited_sheet' => $this->faker->numberBetween(0, 1),
            ];
      }
}
