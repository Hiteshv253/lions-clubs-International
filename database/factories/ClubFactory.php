<?php

namespace Database\Factories;

use App\Models\Club;
use App\Models\Zone;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClubFactory extends Factory {

      protected $model = Club::class;

      public function definition(): array {
            return [
                      'name' => 'Club ' . $this->faker->unique()->bothify('##??'),
                      'zone_id' => \App\Models\Zone::factory(), // ❗ auto-create
            ];
      }
}
