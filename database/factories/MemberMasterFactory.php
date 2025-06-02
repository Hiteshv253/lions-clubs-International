<?php

namespace Database\Factories;

use App\Models\MemberMaster;
use Illuminate\Database\Eloquent\Factories\Factory;

class MemberMasterFactory extends Factory {

      protected $model = MemberMaster::class;

      public function definition(): array {
            return [
                      'first_name' => $this->faker->firstName,
                      'last_name' => $this->faker->lastName,
                      'birthday' => $this->faker->date('Y-m-d'),
                      'gender' => $this->faker->randomElement(['male', 'female']),
                      'occupation' => $this->faker->jobTitle,
                      'mobile' => $this->faker->phoneNumber,
                      'work_email' => $this->faker->unique()->safeEmail,
                      'membership_club_id' => $this->faker->numberBetween(1, 10),
                      'zone_id' => $this->faker->numberBetween(1, 5),
                      'district_id' => $this->faker->numberBetween(1, 5),
                      'region_id' => $this->faker->numberBetween(1, 5),
                      'is_active' => $this->faker->boolean,
                      'is_create_by' => 1, // Assuming created by user ID 1
            ];
      }
}
