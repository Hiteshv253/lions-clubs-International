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
                  $table->string('image')->nullable();         // e.g. filename or URL
                  $table->string('banner_image')->nullable();
                  $table->boolean('is_active')->default(true);
                  $table->unsignedBigInteger('is_create_by'); // user ID who created
                  $table->timestamps();

                  // If you have a users table:
//                  $table->foreign('is_create_by')
//                        ->references('id')->on('users')
//                        ->onDelete('cascade');
            });
      }

      /**
       * Reverse the migrations.
       */
      public function down(): void {
            Schema::dropIfExists('club_event_masters');
      }
};
