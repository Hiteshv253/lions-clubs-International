<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

      /**
       * Run the migrations.
       */
      public function up(): void {
            Schema::create('users', function (Blueprint $table) {
                  $table->id();
                  $table->string('name');
                  $table->string('last_name');
                  $table->string('first_name');
                  $table->string('email')->unique();
                  $table->text('membership_id')->nullable();
                  $table->timestamp('email_verified_at')->nullable();
                  $table->string('password');
                  $table->boolean('is_active')->default(true)->comment('0: active | 1: in-active');
                  $table->unsignedBigInteger('is_create_by')->default(true); // user ID who created
                  $table->rememberToken();
                  $table->timestamp('last_login_at')->nullable();
                  $table->timestamps();
            });
      }

      /**
       * Reverse the migrations.
       */
      public function down(): void {
            Schema::dropIfExists('users');
      }
};
