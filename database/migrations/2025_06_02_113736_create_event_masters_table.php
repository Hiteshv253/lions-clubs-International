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
                  $table->dateTime('date_time');
                  $table->text('description')->nullable();
                  $table->string('image')->nullable();
                  $table->string('banner_image')->nullable();

                  $table->decimal('base_amount', 10, 2)->default(0);
                  $table->decimal('gst_amount', 10, 2)->default(0);
                  $table->decimal('total_amount', 10, 2)->default(0);
                  $table->decimal('gst_rate', 5, 2)->default(0);


                  $table->date('event_start_date');
                  $table->date('event_end_date');
                  $table->boolean('is_active')->default(true);
                  $table->unsignedBigInteger('is_create_by')->nullable();
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
