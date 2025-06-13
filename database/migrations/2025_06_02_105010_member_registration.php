<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

      /**
       * Run the migrations.
       */
      public function up(): void {
            Schema::create('club_member_masters', function (Blueprint $table) {
                  $table->id();
                  $table->string('member_id')->unique();
                  $table->string('first_name');
                  $table->string('last_name');
                  $table->enum('gender', ['Male', 'Female', 'Other'])->nullable();
                  $table->date('birthdate')->nullable();
                  $table->string('address_line1')->nullable();
                  $table->string('address_line2')->nullable();
                  $table->string('address_line3')->nullable();
                  $table->string('email')->unique()->nullable();
                  $table->string('mobile')->nullable();
                  $table->string('home_phone')->nullable();
                  $table->string('zipcode')->nullable();

                  $table->date('join_date')->nullable();

                  $table->foreignId('state_id')->nullable();
                  $table->foreignId('city_id')->nullable();

                  $table->foreignId('region_id')->nullable();
                  $table->foreignId('occupation_id')->nullable();
                  $table->foreignId('account_id')->nullable();
                  $table->foreignId('zone_id')->nullable();
                  $table->foreignId('club_id')->nullable();
                  $table->boolean('is_active')->default(true)->comment('0: active | 1: in-active');
                  $table->unsignedBigInteger('is_create_by')->default(true); // user ID who created
                  $table->timestamps();
            });
      }

      /**
       * Reverse the migrations.
       */
      public function down(): void {
            //
            Schema::dropIfExists('club_member_masters');
      }
};
