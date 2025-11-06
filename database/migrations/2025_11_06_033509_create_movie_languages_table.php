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
    Schema::create('movie_languages', function (Blueprint $table) {
      $table->uuid('id')->primary();
      $table->foreignUuid('movie_id')->references('id')->on('movies')->onDelete('cascade');
      $table->foreignUuid('language_id')->references('id')->on('languages')->onDelete('cascade');
      // Ensure uniqueness of movie/language pair without conflicting with the UUID primary key
      $table->unique(['movie_id', 'language_id']);
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('movie_languages');
  }
};
