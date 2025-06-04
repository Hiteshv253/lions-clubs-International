<?php

namespace Database\Factories;

use App\Models\EventMaster;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventMasterFactory extends Factory {

      protected $model = EventMaster::class;

      public function definition(): array {
            return [
                      'event_name' => $this->faker->sentence,
                      'date_time' => $this->faker->dateTime,
                      'description' => $this->faker->paragraph,
                      'image' => $this->faker->imageUrl(),
                      'banner_image' => $this->faker->imageUrl(),
                      'is_active' => true,
                      'is_create_by' => 1,
            ];
      }
}
