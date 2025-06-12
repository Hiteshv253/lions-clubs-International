<?php

namespace Database\Factories;

use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceFactory extends Factory {

      protected $model = Service::class;

      public function definition(): array {
            return [
                      // Information
                      'report_type' => 'Donation',
                      'title' => $this->faker->sentence(4),
                      'sponsor' => $this->faker->name,
                      'activity_level' => 'Club',
                      'club_name' => 'Lions Club',
                      'cause' => 'Other Humanitarian Service',
                      'project_type' => 'Donation',
                      'description' => $this->faker->paragraph,
                      'start_date' => $this->faker->date(),
                      'end_date' => $this->faker->date(),
                      // Required Metrics
                      'currency' => 'INR - Indian Rupee',
                      'total_funds_donated_inr' => $this->faker->randomFloat(2, 1000, 25000),
                      'total_funds_donated_usd' => $this->faker->randomFloat(2, 10, 500),
                      'organization_served_for' => 'Individual Student',
                      // Optional Metrics
                      'donation_in_lcif' => $this->faker->boolean,
                      'people_served' => $this->faker->numberBetween(1, 10),
                      'total_volunteer_hours' => $this->faker->randomFloat(2, 1, 10),
                      'total_funds_raised_inr' => $this->faker->randomFloat(2, 1000, 30000),
                      'total_funds_raised_usd' => $this->faker->randomFloat(2, 10, 600),
                      'non_lion_participants' => $this->faker->numberBetween(0, 5),
                      'non_lion_family_participants' => $this->faker->numberBetween(0, 3),
                      'trees_planted' => $this->faker->numberBetween(0, 10),
                      // Additional Details
                      'signature_activity' => $this->faker->boolean ? 'Yes' : 'No',
                      'venue' => $this->faker->company,
                      'funded_by_lcif_grant' => $this->faker->boolean,
                      'venue_location' => $this->faker->address,
                      'venue_timezone' => 'Asia/Kolkata',
                      // Sponsor Details
                      'sponsor_club' => 'India, South Asia and the Middle East',
                      'sponsor_district' => 'District 323-M',
                      'is_active' => $this->faker->numberBetween(0, 1),
                      'is_create_by' => $this->faker->numberBetween(1, 5),
            ];
      }
}
