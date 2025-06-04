<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ZipCode>
 */
class ZipCodeFactory extends Factory {

      /**
       * Define the model's default state.
       *
       * @return array<string, mixed>
       */
      public function definition(): array {
            return [
                      'zip_code' => $this->faker->postcode,
                      'city_id' => \App\Models\City::factory(), // or set manually in seeder
                      'is_active' => $this->faker->boolean(90),
                      'is_create_by' => $this->faker->numberBetween(1, 5),
            ];
      }
}
