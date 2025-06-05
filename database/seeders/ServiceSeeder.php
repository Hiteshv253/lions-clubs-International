<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;
use Faker\Factory as Faker;

class ServiceSeeder extends Seeder {

      public function run(): void {
            $faker = Faker::create();

            foreach (range(1, 500) as $index) {
                  Service::create([
                            'report_type' => 'Donation',
                            'title' => $faker->sentence(4),
                            'sponsor' => $faker->name,
                            'activity_level' => 'Club',
                            'club_name' => 'Lions Club',
                            'cause' => 'Other Humanitarian Service',
                            'project_type' => 'Donation',
                            'description' => $faker->paragraph,
                            'start_date' => $faker->date,
                            'end_date' => $faker->date,
                            'currency' => 'INR - Indian Rupee',
                            'total_funds_donated_inr' => $faker->randomFloat(2, 1000, 25000),
                            'total_funds_donated_usd' => $faker->randomFloat(2, 10, 500),
                            'organization_served_for' => 'Individual Student',
                            'donation_in_lcif' => $faker->boolean,
                            'people_served' => $faker->numberBetween(1, 10),
                            'total_volunteer_hours' => $faker->randomFloat(2, 1, 5),
                            'total_funds_raised_inr' => $faker->randomFloat(2, 1000, 25000),
                            'total_funds_raised_usd' => $faker->randomFloat(2, 10, 500),
                            'non_lion_participants' => $faker->numberBetween(0, 5),
                            'non_lion_family_participants' => $faker->numberBetween(0, 3),
                            'trees_planted' => $faker->numberBetween(0, 10),
                            'signature_activity' => $faker->boolean ? 'Yes' : 'No',
                            'venue' => $faker->company,
                            'funded_by_lcif_grant' => $faker->boolean,
                            'venue_location' => $faker->address,
                            'venue_timezone' => 'Asia/Kolkata',
                            'sponsor_club' => 'India, South Asia and the Middle East',
                            'sponsor_district' => 'District 323-M',
                  ]);
            }
      }
}
