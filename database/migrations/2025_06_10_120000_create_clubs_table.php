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
                  $table->foreignId('zone_id')->constrained()->onDelete('cascade');
                  $table->string('name');
                  $table->string('club_number');
                  $table->string('about_club');
                  $table->date('charter_date')->nullable();
                  $table->date('inauguration_date_club')->nullable();
                  $table->string('image')->nullable();
                  $table->boolean('is_active')->default(true)->comment('0: active | 1: in-active');
                  $table->unsignedBigInteger('is_create_by')->default(true); // user ID who createdreated
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
