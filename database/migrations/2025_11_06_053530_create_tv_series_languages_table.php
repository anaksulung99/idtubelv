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
    Schema::create('tv_series_languages', function (Blueprint $table) {
      $table->uuid('id')->primary();
      $table->foreignUuid('tv_series_id')->constrained('tv_series', 'id')->onDelete('cascade');
      $table->foreignUuid('language_id')->constrained('languages', 'id')->onDelete('cascade');
      // Ensure uniqueness of tv series/language pair without conflicting with the UUID primary key
      $table->unique(['tv_series_id', 'language_id']);
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('tv_series_languages');
  }
};
