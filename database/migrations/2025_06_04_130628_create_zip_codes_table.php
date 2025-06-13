<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

      /**
       * Run the migrations.
       */
      public function up(): void {
            Schema::create('zip_codes', function (Blueprint $table) {
                  $table->id();
                  $table->foreignId('city_id')->constrained()->onDelete('cascade');
                  $table->string('zip_code');
                  $table->boolean('is_active')->default(true)->comment('0: active | 1: in-active');
                  $table->unsignedBigInteger('is_create_by')->default(true); // user ID who created
                  $table->timestamps();
            });
      }

      /**
       * Reverse the migrations.
       */
      public function down(): void {
            Schema::dropIfExists('zip_codes');
      }
};
