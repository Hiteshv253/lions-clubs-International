<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\MemberMaster;
use Illuminate\Database\Eloquent\Factories\Factory;

class MemberMasterFactory extends Factory {

      protected $model = MemberMaster::class;

      public function definition(): array {
            return [
                      'member_id' => strtoupper(Str::random(8)),
                      'first_name' => $this->faker->firstName,
                      'last_name' => $this->faker->lastName,
                      'address_line1' => $this->faker->streetAddress,
                      'address_line2' => $this->faker->secondaryAddress,
                      'address_line3' => $this->faker->optional()->streetSuffix,
                      'zip' => $this->faker->postcode,
                      'birthdate' => $this->faker->date('Y-m-d', '2000-01-01'),
                      'email' => $this->faker->unique()->safeEmail,
                      'mobile' => $this->faker->phoneNumber,
                      'home_phone' => $this->faker->phoneNumber,
                      'gender' => $this->faker->randomElement(['Male', 'Female', 'Other']),
                      'city_id' => $this->faker->numberBetween(1, 50),
                      'state_id' => $this->faker->numberBetween(1, 50),
                      'occupation_id' => $this->faker->numberBetween(1, 500),
                      'account_id' => $this->faker->numberBetween(1, 500),
                      'join_date' => $this->faker->date(),
                      'is_active' => $this->faker->boolean(90),
                      'is_create_by' => $this->faker->numberBetween(1, 500),
            ];
      }
}
