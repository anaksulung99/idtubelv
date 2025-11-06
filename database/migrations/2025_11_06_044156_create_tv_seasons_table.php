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
    Schema::create('tv_seasons', function (Blueprint $table) {
      $table->uuid('id')->primary();
      $table->foreignUuid('tv_series_id')->constrained('tv_series')->onDelete('cascade');
      $table->integer('tmdb_id')->nullable();
      $table->string('season_id')->nullable();
      $table->string('name')->nullable();
      $table->string('poster_path')->nullable();
      $table->text('overview')->nullable();
      $table->string('air_date')->nullable();
      $table->integer('season_number')->nullable();
      $table->float('vote_average')->nullable();
      $table->integer('episode_count')->nullable();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('tv_seasons');
  }
};
