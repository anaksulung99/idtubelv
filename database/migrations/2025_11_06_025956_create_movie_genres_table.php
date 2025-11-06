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
    Schema::create('movie_genres', function (Blueprint $table) {
      $table->uuid('id')->primary();
      $table->foreignUuid('genre_id')->constrained('genres', 'id')->onDelete('cascade');
      $table->foreignUuid('movie_id')->constrained('movies', 'id')->onDelete('cascade');
      $table->primary(['genre_id', 'movie_id']);
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('movie_genres');
  }
};
