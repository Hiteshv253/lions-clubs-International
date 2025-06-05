<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

      /**
       * Run the migrations.
       */
      public function up() {
            Schema::create('clubs', function (Blueprint $table) {
                  $table->id();
                  $table->string('account_name');
                  $table->string('type')->nullable();
                  $table->string('parent_account')->nullable();
                  $table->string('district')->nullable();
                  $table->string('region_zone')->nullable();
                  $table->string('lion_id')->nullable();
                  $table->date('charter_established_date')->nullable();
                  $table->integer('active_member_count')->nullable();
                  $table->string('club_specialty')->nullable();
                  $table->string('club_sub_specialty')->nullable();
                  $table->string('specialty_description')->nullable();
                  $table->text('description')->nullable();
                  $table->string('website')->nullable();

                  // Meeting Location 1
                  $table->string('meeting_place')->nullable();
                  $table->string('meeting_week')->nullable();
                  $table->string('meeting_day')->nullable();
                  $table->string('meeting_time')->nullable();
                  $table->string('meeting_street')->nullable();
                  $table->string('meeting_city')->nullable();
                  $table->string('meeting_state')->nullable();
                  $table->string('meeting_zip')->nullable();
                  $table->string('meeting_country')->nullable();
                  $table->string('meeting_local_place')->nullable();
                  $table->string('meeting_local_street')->nullable();
                  $table->string('meeting_local_city')->nullable();
                  $table->string('meeting_local_zip')->nullable();
                  $table->string('meeting_local_state')->nullable();
                  $table->string('meeting_local_country')->nullable();
                  $table->boolean('online_meeting_1')->default(false);
                  $table->string('online_meeting_1_place')->nullable();
                  $table->string('online_meeting_1_address')->nullable();

                  // Meeting Location 2
                  $table->string('meeting2_place')->nullable();
                  $table->string('meeting2_week')->nullable();
                  $table->string('meeting2_day')->nullable();
                  $table->string('meeting2_time')->nullable();
                  $table->string('meeting2_street')->nullable();
                  $table->string('meeting2_city')->nullable();
                  $table->string('meeting2_state')->nullable();
                  $table->string('meeting2_zip')->nullable();
                  $table->string('meeting2_country')->nullable();
                  $table->string('meeting2_local_place')->nullable();
                  $table->string('meeting2_local_street')->nullable();
                  $table->string('meeting2_local_city')->nullable();
                  $table->string('meeting2_local_zip')->nullable();
                  $table->string('meeting2_local_state')->nullable();
                  $table->string('meeting2_local_country')->nullable();
                  $table->boolean('online_meeting_2')->default(false);
                  $table->string('online_meeting_2_place')->nullable();

                  $table->timestamps();
            });
      }

      /**
       * Reverse the migrations.
       */
      public function down(): void {
            Schema::dropIfExists('clubs');
      }
};
