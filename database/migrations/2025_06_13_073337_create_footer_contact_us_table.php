<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

      /**
       * Run the migrations.
       */
      public function up(): void {
            Schema::create('footer_contact_us', function (Blueprint $table) {
                  $table->id();
                  $table->string('name');
                  $table->string('email');
                  $table->text('message');
                  $table->text('contact_no');
                  $table->boolean('is_active')->default(true)->comment('0: active | 1: in-active');
                  $table->string('inquery_from')->default(true)->comment('0: footer | 1: contat');
                  $table->timestamps();
            });
      }

      /**
       * Reverse the migrations.
       */
      public function down(): void {
            Schema::dropIfExists('footer_contact_us');
      }
};
