<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RegionFactory extends Factory {

      protected $model = \App\Models\Region::class;

      public function definition(): array {
            return [
                      'name' => $this->faker->streetName,
            ];
      }
}
