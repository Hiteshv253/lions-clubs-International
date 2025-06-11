<?php

namespace Database\Factories;

use App\Models\Zone;
use Illuminate\Database\Eloquent\Factories\Factory;

class ZoneFactory extends Factory {

      protected $model = Zone::class;

      public function definition(): array {
            return [
                      'name' => 'Zone ' . $this->faker->unique()->numberBetween(1, 999),
            ];
      }
}
