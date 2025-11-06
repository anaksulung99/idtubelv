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
    Schema::create('movie_countries', function (Blueprint $table) {
      $table->uuid('id')->primary();
      $table->foreignUuid('movie_id')->constrained('movies', 'id')->onDelete('cascade');
      $table->foreignUuid('country_id')->constrained('countries', 'id')->onDelete('cascade');
      $table->primary(['movie_id', 'country_id']);
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('movie_countries');
  }
};
