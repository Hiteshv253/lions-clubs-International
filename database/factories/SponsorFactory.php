<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sponsor>
 */
class SponsorFactory extends Factory {

      /**
       * Define the model's default state.
       *
       * @return array<string, mixed>
       */
      public function definition(): array {
            return [
                      'name' => $this->faker->company,
                      'logo' => $this->faker->image('public/storage/sponsors', 100, 100, null, false),
                      'website' => $this->faker->url,
                      'is_active' => $this->faker->boolean(90),
                      'is_create_by' => $this->faker->numberBetween(1, 5),
            ];
      }
}
