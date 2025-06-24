<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory {

      /**
       * Define the model's default state.
       *
       * @return array<string, mixed>
       */
      public function definition(): array {
            $firstName = $this->faker->firstName;
            $lastName = $this->faker->lastName;

            // Safe unique number for demonstration
            static $counter = 1;

            return [
                      'name' => $firstName . ' ' . $lastName,
                      'first_name' => $firstName,
                      'last_name' => $lastName,
                      'membership_id' => strtolower(substr($firstName, 0, 5) . str_pad($counter++, 3, '0', STR_PAD_LEFT) . substr($lastName, 5)),
                      'email' => $this->faker->unique()->safeEmail(),
                      'email_verified_at' => now(),
                      'password' => bcrypt('password'), // Or keep your hash
                      'remember_token' => Str::random(10),
                      'is_active' => $this->faker->numberBetween(0, 1),
                      'is_create_by' => $this->faker->numberBetween(1, 5),
            ];
      }

      /**
       * Indicate that the model's email address should be unverified.
       */
      public function unverified(): static {
            return $this->state(fn(array $attributes) => [
                            'email_verified_at' => null,
            ]);
      }
}
