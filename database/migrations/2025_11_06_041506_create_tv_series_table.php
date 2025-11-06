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
    Schema::create('tv_series', function (Blueprint $table) {
      $table->uuid('id')->primary();
      $table->integer('tmdb_id')->nullable();
      $table->string('name')->nullable();
      $table->string('original_name')->nullable();
      $table->text('overview')->nullable();
      $table->string('tagline')->nullable();
      $table->text('poster_path')->nullable();
      $table->text('backdrop_path')->nullable();
      $table->string('first_air_date')->nullable();
      $table->string('last_air_date')->nullable();
      $table->json('next_episode_to_air')->nullable();
      $table->json('last_episode_to_air')->nullable();
      $table->integer('number_of_seasons')->unsigned()->nullable();
      $table->integer('number_of_episodes')->unsigned()->nullable();
      $table->string('original_language')->nullable();
      $table->json('origin_country')->nullable();
      $table->string('homepage')->nullable();
      $table->boolean('in_production')->default(false);
      $table->string('type')->nullable();
      $table->string('status')->nullable();
      $table->boolean('adult')->default(false);
      $table->float('vote_average')->nullable();
      $table->integer('vote_count')->nullable();
      $table->float('popularity')->nullable();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('tv_series');
  }
};
