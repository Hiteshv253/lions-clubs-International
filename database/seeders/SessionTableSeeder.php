<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class SessionTableSeeder extends Seeder {

      public function run(): void {
            foreach (range(1, 10) as $i) {
                  DB::table('sessions')->insert([
                            'id' => Str::uuid()->toString(),
                            'user_id' => rand(1, 5), // assuming user IDs 1 to 5 exist
                            'ip_address' => fake()->ipv4(),
                            'user_agent' => fake()->userAgent(),
                            'payload' => base64_encode(serialize(['_token' => Str::random(40)])),
                            'last_activity' => Carbon::now()->timestamp - rand(0, 3600),
                  ]);
            }
      }
}
