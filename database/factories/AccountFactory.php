<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AccountFactory extends Factory {

      protected $model = \App\Models\Account::class;

      public function definition() {
            $types = ['Asset', 'Liability', 'Equity', 'Income', 'Expense'];

            return [
                      'name' => $this->faker->company(), // Fake company name
                      'code' => 'ACC-' . $this->faker->unique()->numberBetween(1000, 9999),
                      'account_no' => $this->faker->unique()->numberBetween(1000, 9999),
                      'type' => $this->faker->randomElement($types),
                      'is_active' => $this->faker->numberBetween(0, 1),
                      'is_create_by' => $this->faker->numberBetween(1, 5),
            ];
      }
}
