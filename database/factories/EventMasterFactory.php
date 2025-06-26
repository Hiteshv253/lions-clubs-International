<?php

namespace Database\Factories;

use App\Models\EventMaster;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventMasterFactory extends Factory {

      protected $model = EventMaster::class;

      public function definition(): array {
            return [
                      'event_name' => $this->faker->sentence,
                      'event_end_date' => $this->faker->dateTime,
                      'event_start_date' => $this->faker->dateTime,
                      'description' => $this->faker->paragraph,
                      'image' => 'https://picsum.photos/640/480?random=' . rand(1, 1000),
                      'total_amount' => $this->faker->numberBetween(0, 1000),
                      'is_active' => $this->faker->numberBetween(0, 1),
                      'is_create_by' => $this->faker->numberBetween(1, 5),
            ];
      }
}
