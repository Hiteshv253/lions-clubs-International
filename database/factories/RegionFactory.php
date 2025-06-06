<?php

namespace Database\Factories;

use App\Models\Region;
use Illuminate\Database\Eloquent\Factories\Factory;

class RegionFactory extends Factory {

      protected $model = Region::class; // ✅ Ensure this is correct

      public function definition(): array {
            return [
                      'name' => $this->faker->city(),
                      'parent_id' => null,
            ];
      }
}
