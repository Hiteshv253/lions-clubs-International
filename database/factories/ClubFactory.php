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
                      'club_number' => $this->faker->numberBetween(1000, 5000),
                      'inauguration_date_club' => $this->faker->date('Y-m-d', '2000-01-01'),
                      'charter_date' => $this->faker->date('Y-m-d', '2000-01-01'),
                      'zone_id' => \App\Models\Zone::factory(), // ❗ auto-create
                      'is_active' => $this->faker->numberBetween(0, 1),
                      'is_create_by' => $this->faker->numberBetween(1, 5),
            ];
      }
}
