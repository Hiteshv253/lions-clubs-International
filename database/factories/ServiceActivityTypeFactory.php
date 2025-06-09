<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ServiceActivityType>
 */
class ServiceActivityTypeFactory extends Factory {

      /**
       * Define the model's default state.
       *
       * @return array<string, mixed>
       */
      public function definition(): array {
            return [
                      'name' => $this->faker->unique()->jobTitle, // Or custom faker text
                      'description' => $this->faker->sentence(10),
                      'is_active' => $this->faker->boolean(90),
                      'is_create_by' => $this->faker->numberBetween(1, 5),
            ];
      }
}
