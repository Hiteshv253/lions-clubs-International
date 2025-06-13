<?php

namespace Database\Factories;

use App\Models\DgTeam;
use Illuminate\Database\Eloquent\Factories\Factory;

class DgTeamFactory extends Factory {

      protected $model = DgTeam::class;

      public function definition() {
            return [
                      'name' => $this->faker->name,
                      'email' => $this->faker->unique()->safeEmail,
                      'designation' => $this->faker->jobTitle,
                      'phone' => $this->faker->phoneNumber,
                      'address' => $this->faker->address,
                      'is_active' => $this->faker->numberBetween(0, 1),
                      'is_create_by' => $this->faker->numberBetween(1, 5),
            ];
      }
}
