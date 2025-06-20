<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Account;
use Faker\Factory as Faker;

class AccountSeeder extends Seeder {

      /**
       * Run the database seeds.
       */
      public function run(): void {
            $faker = Faker::create();
            foreach (range(1, 10) as $i) {
                  Account::create([
                            'name' => $faker->company,
                            'code' => strtoupper($faker->unique()->bothify('ACC-###')),
                            'account_no' => $faker->unique()->numberBetween(10000000, 999888999),
                            'type' => $faker->randomElement(['Asset', 'Liability', 'Equity', 'Income', 'Expense']),
                            'is_active' => rand(0, 1),
                  ]);
            }
      }
}
