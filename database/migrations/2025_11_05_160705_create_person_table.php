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
    Schema::create('persons', function (Blueprint $table) {
      $table->uuid('id')->primary();
      $table->integer('tmdb_id')->nullable();
      $table->string('name')->nullable();
      $table->text('profile_path')->nullable();
      $table->integer('gender')->nullable();
      $table->boolean('adult')->default(false);
      $table->string('known_for_department')->nullable();
      $table->float('popularity')->nullable();
      $table->date('birthday')->nullable();
      $table->date('deathday')->nullable();
      $table->string('place_of_birth')->nullable();
      $table->text('biography')->nullable();
      $table->text('homepage')->nullable();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('persons');
  }
};
