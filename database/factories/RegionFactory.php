<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RegionFactory extends Factory {

      protected $model = \App\Models\Region::class;

      public function definition(): array {
            return [
                      'name' => $this->faker->streetName,
                      'is_active' => $this->faker->numberBetween(0, 1),
                      'is_create_by' => $this->faker->numberBetween(1, 5),
            ];
      }
}
