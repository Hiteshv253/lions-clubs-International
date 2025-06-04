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
                  $table->string('account_name')->nullable();
                  $table->string('parent_region')->nullable();
                  $table->string('parent_zone')->nullable();
                  $table->string('member_id')->nullable();
                  $table->string('first_name');
                  $table->string('last_name');
                  $table->string('address_line1')->nullable();
                  $table->string('address_line2')->nullable();
                  $table->string('address_line3')->nullable();
                  $table->string('city')->nullable();
                  $table->string('state')->nullable();
                  $table->string('zip')->nullable();
                  $table->date('birthdate')->nullable();
                  $table->string('email')->nullable();
                  $table->string('mobile')->nullable();
                  $table->string('home_phone')->nullable();
                  $table->string('gender')->nullable();
                  $table->string('occupation')->nullable();
                  $table->date('join_date')->nullable();
                  $table->boolean('is_active')->default(true);
                  $table->unsignedBigInteger('is_create_by')->nullable();
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
