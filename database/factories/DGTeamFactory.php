<?php

namespace Database\Factories;

use App\Models\DGTeam;
use Illuminate\Database\Eloquent\Factories\Factory;

class DGTeamFactory extends Factory {

      protected $model = DGTeam::class;

      public function definition() {
            return [
                      'name' => $this->faker->name,
                      'email' => $this->faker->unique()->safeEmail,
                      'designation' => $this->faker->jobTitle,
                      'phone' => $this->faker->phoneNumber,
                      'address' => $this->faker->address,
                      'is_active' => true,
                      'is_create_by' => 1,
            ];
      }
}
