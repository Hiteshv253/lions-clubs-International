<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

      /**
       * Run the migrations.
       */
      public function up(): void {
            Schema::create('event_registrations', function (Blueprint $table) {
                  $table->id();
                  $table->string('name');
                  $table->string('email');
                  $table->string('contact_number')->nullable();
                  $table->unsignedBigInteger('event_id');
                  $table->string('event_qr_code')->nullable();
                  $table->string('event_qr_code_path')->nullable();
                  $table->integer('number_of_persons')->default(1);
                  $table->string('user_id')->nullable();
                  $table->decimal('calculated_total', 10, 2)->nullable();
                  $table->tinyInteger('is_active')->default(1)->comment('0: active | 1: in-active');
                  $table->timestamps();
            });
      }

      /**
       * Reverse the migrations.
       */
      public function down(): void {
            Schema::dropIfExists('event_registrations');
      }
};
