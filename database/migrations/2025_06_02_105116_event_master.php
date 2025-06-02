<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

      /**
       * Run the migrations.
       */
      public function up(): void {
            //
            Schema::create('club_event_masters', function (Blueprint $table) {
                  $table->id();
                  $table->timestamps();
                  $table->string('event_name');
                  $table->date('date_time');
                  $table->text('description');
                  $table->string('image')->nullable();
                  $table->text('banner_image')->nullable();
                  $table->integer('is_active');
                  $table->integer('is_create_by');
            });
      }

      /**
       * Reverse the migrations.
       */
      public function down(): void {
            //
            Schema::dropIfExists('club_event_masters');
      }
};
