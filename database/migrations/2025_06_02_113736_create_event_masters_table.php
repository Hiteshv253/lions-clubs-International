<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

      /**
       * Run the migrations.
       */
      public function up(): void {
            Schema::create('club_event_masters', function (Blueprint $table) {
                  $table->id();
                  $table->string('event_name');

                  $table->text('description')->nullable();

                  $table->string('image')->nullable();
                  $table->string('event_qr_code')->nullable();
                  $table->decimal('total_amount', 10, 2)->default(0);

                  $table->date('event_start_date');
                  $table->date('event_end_date');
                   $table->boolean('is_active')->default(true)->comment('0: active | 1: in-active');
                   $table->boolean('limited_sheet')->default(true)->comment('0: yes | 1: no');
                  $table->unsignedBigInteger('is_create_by')->nullable();

                  $table->string('venue_name')->nullable();
                  $table->boolean('flag_id')->default(0)->comment('0: from browser  | 1: from admin panle');
                  
                  $table->string('total_event_users')->nullable()->comment('total avalabe');
                  $table->string('total_registered_user')->nullable()->comment('total registred');
                  $table->string('total_pendding_users')->nullable()->comment('total pendding');


                  $table->timestamps();
            });
      }

      /**
       * Reverse the migrations.
       */
      public function down(): void {
            Schema::dropIfExists('club_event_masters');
      }
};
