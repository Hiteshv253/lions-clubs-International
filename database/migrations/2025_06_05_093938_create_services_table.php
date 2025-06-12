<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

      /**
       * Run the migrations.
       */
      public function up(): void {
            Schema::create('services', function (Blueprint $table) {
                  $table->id();
                  // Information
                  $table->string('report_type')->default('Donation');
                  $table->string('title');
                  $table->string('sponsor');
                  $table->string('activity_level');
                  $table->string('club_name');
                  $table->string('cause');
                  $table->string('project_type');
                  $table->text('description')->nullable();
                  $table->date('start_date')->nullable();
                  $table->date('end_date')->nullable();

                  // Required Metrics
                  $table->string('currency')->default('INR - Indian Rupee');
                  $table->decimal('total_funds_donated_inr', 10, 2)->default(0);
                  $table->decimal('total_funds_donated_usd', 10, 2)->default(0);
                  $table->string('organization_served_for')->nullable();

                  // Optional Metrics
                  $table->boolean('donation_in_lcif')->default(false);
                  $table->integer('people_served')->nullable();
                  $table->decimal('total_volunteer_hours', 8, 2)->nullable();
                  $table->decimal('total_funds_raised_inr', 10, 2)->nullable();
                  $table->decimal('total_funds_raised_usd', 10, 2)->nullable();
                  $table->integer('non_lion_participants')->nullable();
                  $table->integer('non_lion_family_participants')->nullable();
                  $table->integer('trees_planted')->nullable();

                  // Additional
                  $table->string('signature_activity')->nullable();
                  $table->string('venue')->nullable();
                  $table->boolean('funded_by_lcif_grant')->default(false);
                  $table->string('venue_location')->nullable();
                  $table->string('venue_timezone')->nullable();

                  // Sponsor Details
                  $table->string('sponsor_club')->nullable();
                  $table->string('sponsor_district')->nullable();
                $table->boolean('is_active')->default(true);
                  $table->unsignedBigInteger('is_create_by')->default(true); // user ID who created
                  $table->timestamps();
            });
      }

      /**
       * Reverse the migrations.
       */
      public function down(): void {
            Schema::dropIfExists('services');
      }
};
