<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Occupation;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Occupation>
 */
class OccupationFactory extends Factory {

      /**
       * Define the model's default state.
       *
       * @return array<string, mixed>
       */
      protected $model = Occupation::class;

      public function definition(): array {
            return [
                      'name' => fake()->name(),
                      'is_active' => $this->faker->numberBetween(0, 1),
                      'is_create_by' => $this->faker->numberBetween(1, 5),
            ];
      }
}
