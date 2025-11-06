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
    Schema::create('movies', function (Blueprint $table) {
      $table->uuid('id')->primary();
      $table->integer('tmdb_id')->nullable();
      $table->string('imdb_id')->nullable();
      $table->string('title')->nullable();
      $table->text('overview')->nullable();
      $table->string('original_title')->nullable();
      $table->string('tagline')->nullable();
      $table->text('poster_path')->nullable();
      $table->text('backdrop_path')->nullable();
      $table->string('release_date')->nullable();
      $table->string('original_language')->nullable();
      $table->json('origin_country')->nullable();
      $table->string('homepage')->nullable();
      $table->string('status')->nullable();
      $table->boolean('adult')->default(false);
      $table->boolean('video')->default(false);
      $table->integer('budget')->nullable();
      $table->integer('revenue')->nullable();
      $table->integer('runtime')->nullable();
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
    Schema::dropIfExists('movies');
  }
};
