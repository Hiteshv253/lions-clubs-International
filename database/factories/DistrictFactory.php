<?php

namespace Database\Factories;

use App\Models\District;
use Illuminate\Database\Eloquent\Factories\Factory;

class DistrictFactory extends Factory {

      protected $model = District::class;

      public function definition(): array {
            return [
                      'name' => $this->faker->unique()->city,
                      'state_id' => \App\Models\State::factory(), // or set manually in seeder
                      'is_active' => $this->faker->numberBetween(0, 1),
                      'is_create_by' => $this->faker->numberBetween(1, 5),
            ];
      }
}
