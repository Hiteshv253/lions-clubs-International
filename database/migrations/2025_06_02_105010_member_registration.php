<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

      /**
       * Run the migrations.
       */
      public function up(): void {
            Schema::create('club_member_masters', function (Blueprint $table) {
                  $table->id();
                  $table->timestamps();
                  $table->string('first_name');
                  $table->string('last_name');
                  $table->date('birthday');
                  $table->string('occupation');
                  $table->string('gender');
                  $table->string('mobile');
                  $table->string('work_email');
                  $table->integer('membership_club_id');
                  $table->integer('zone_id');
                  $table->integer('district_id');
                  $table->integer('region_id');
                  $table->integer('is_active');
                  $table->integer('is_create_by');
            });
      }

      /**
       * Reverse the migrations.
       */
      public function down(): void {
            //
            Schema::dropIfExists('club_member_masters');
      }
};
