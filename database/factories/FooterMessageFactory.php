<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FooterMessage>
 */
class FooterMessageFactory extends Factory {

      /**
       * Define the model's default state.
       *
       * @return array<string, mixed>
       */
      public function definition(): array {
            return [
                      'name' => $this->faker->name(),
                      'email' => $this->faker->safeEmail(),
                      'message' => $this->faker->paragraph(2),
                      'contact_no' => $this->faker->phoneNumber,
                      'is_active' => $this->faker->numberBetween(0, 1),
                      'inquery_from' => $this->faker->numberBetween(0, 1),
            ];
      }
}
