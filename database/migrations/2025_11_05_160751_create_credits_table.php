<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('credits', function (Blueprint $table) {
      $table->uuid('id')->primary();
      $table->integer('tmdb_id')->nullable();
      $table->integer('cast_id')->nullable();
      $table->text('credit_id')->nullable();
      $table->string('name')->nullable();
      $table->string('original_name')->nullable();
      $table->text('profile_path')->nullable();
      $table->string('character')->nullable();
      $table->integer('gender')->nullable();
      $table->boolean('adult')->default(false);
      $table->string('known_for_department')->nullable();
      $table->float('popularity')->nullable();
      $table->integer('order')->nullable();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('credits');
  }
};
