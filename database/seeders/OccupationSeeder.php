<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Occupation;

class OccupationSeeder extends Seeder {

      public function run(): void {
            $occupations = [
                      ['name' => 'Software Engineer'],
                      ['name' => 'Doctor'],
                      ['name' => 'Teacher'],
                      ['name' => 'Architect'],
                      ['name' => 'Lawyer'],
                      ['name' => 'Electrician'],
                      ['name' => 'Plumber'],
                      ['name' => 'Civil Engineer'],
                      ['name' => 'Accountant'],
                      ['name' => 'Pharmacist'],
            ];

            Occupation::insert($occupations);
      }
}
