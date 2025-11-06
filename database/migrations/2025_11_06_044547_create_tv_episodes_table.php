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
    Schema::create('tv_episodes', function (Blueprint $table) {
      $table->uuid('id')->primary();
      $table->foreignUuid('tv_season_id')->constrained('tv_seasons')->onDelete('cascade');
      $table->integer('tmdb_id')->nullable();
      $table->string('name');
      $table->text('overview')->nullable();
      $table->text('still_path')->nullable();
      $table->string('air_date')->nullable();
      $table->integer('episode_number')->nullable();
      $table->integer('season_number')->nullable();
      $table->string('episode_type')->nullable();
      $table->string('production_code')->nullable();
      $table->integer('runtime')->nullable();
      $table->float('vote_average')->nullable();
      $table->integer('vote_count')->nullable();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('tv_episodes');
  }
};
