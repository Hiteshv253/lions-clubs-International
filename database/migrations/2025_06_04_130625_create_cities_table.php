<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

      /**
       * Run the migrations.
       */
      public function up(): void {
            Schema::create('cities', function (Blueprint $table) {
                  $table->id();
                  $table->foreignId('state_id')->constrained()->onDelete('cascade');
                  $table->string('name');
                  $table->boolean('is_active')->default(true);
                  $table->unsignedBigInteger('is_create_by')->nullable();
                  $table->timestamps();
            });
      }

      /**
       * Reverse the migrations.
       */
      public function down(): void {
            Schema::dropIfExists('cities');
      }
};
