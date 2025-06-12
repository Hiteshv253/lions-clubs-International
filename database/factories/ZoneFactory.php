<?php

namespace Database\Factories;

use App\Models\Zone;
use Illuminate\Database\Eloquent\Factories\Factory;

class ZoneFactory extends Factory {

      protected $model = Zone::class;

      public function definition(): array {
            return [
                      'name' => 'Zone ' . $this->faker->unique()->numberBetween(1, 999),
                      'is_active' => $this->faker->numberBetween(0, 1),
                      'is_create_by' => $this->faker->numberBetween(1, 5),
            ];
      }
}
