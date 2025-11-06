<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('comments', function (Blueprint $table) {
      $table->uuid('id')->primary();
      $table->foreignUuid('movie_id')->nullable()->constrained('movies')->onDelete('cascade');
      $table->foreignUuid('series_id')->nullable()->constrained('tv_series')->onDelete('cascade');
      $table->foreignUuid('episode_id')->nullable()->constrained('tv_episodes')->onDelete('cascade');
      $table->foreignUuid('user_id')->constrained()->onDelete('cascade');
      $table->foreignUuid('parent_id')->nullable(); // For replies; add FK after table creation to avoid self-reference issues on Postgres
      $table->enum('commentable_type', ['movie', 'series', 'episode'])->nullable();
      $table->text('content');
      $table->integer('likes')->default(0);
      $table->timestamps();
      // Indexes
      $table->index('movie_id');
      $table->index('series_id');
      $table->index('episode_id');
      $table->index('user_id');
      $table->index('parent_id');
      $table->index('commentable_type');
    });
    // Add self-referencing foreign key for parent_id after table creation (Postgres requires existing unique/primary key)
    Schema::table('comments', function (Blueprint $table) {
      $table->foreign('parent_id')->references('id')->on('comments')->onDelete('cascade');
    });
    // Postgres check constraint: exactly one of movie_id/series_id/episode_id must be set
    DB::statement('ALTER TABLE comments ADD CONSTRAINT comments_only_one_target CHECK (
      (movie_id IS NOT NULL AND series_id IS NULL AND episode_id IS NULL) OR
      (movie_id IS NULL AND series_id IS NOT NULL AND episode_id IS NULL) OR
      (movie_id IS NULL AND series_id IS NULL AND episode_id IS NOT NULL)
    )');
    Schema::create('comment_likes', function (Blueprint $table) {
      $table->uuid('id')->primary();
      $table->foreignUuid('comment_id')->constrained()->onDelete('cascade');
      $table->foreignUuid('user_id')->constrained()->onDelete('cascade');
      $table->timestamps();

      // Unique constraint - user can only like once
      $table->unique(['comment_id', 'user_id']);
    });

    Schema::create('video_likes', function (Blueprint $table) {
      $table->uuid('id')->primary();
      $table->foreignUuid('movie_id')->nullable()->constrained('movies')->onDelete('cascade');
      $table->foreignUuid('series_id')->nullable()->constrained('tv_series')->onDelete('cascade');
      $table->foreignUuid('episode_id')->nullable()->constrained('tv_episodes')->onDelete('cascade');
      $table->foreignUuid('user_id')->nullable()->constrained()->onDelete('cascade'); // Nullable for guest
      $table->enum('likeable_type', ['movie', 'series', 'episode'])->nullable();
      $table->string('ip_address')->nullable(); // For guest tracking
      $table->timestamps();

      // Indexes
      $table->index(['movie_id', 'user_id']);
      $table->index(['movie_id', 'ip_address']);
      $table->index(['series_id', 'user_id']);
      $table->index(['series_id', 'ip_address']);
      $table->index(['episode_id', 'user_id']);
      $table->index(['episode_id', 'ip_address']);

      $table->unique(['movie_id', 'user_id']);
      $table->unique(['movie_id', 'ip_address']);
      $table->unique(['series_id', 'user_id']);
      $table->unique(['series_id', 'ip_address']);
      $table->unique(['episode_id', 'user_id']);
      $table->unique(['episode_id', 'ip_address']);
    });
    // Postgres check constraint: exactly one of movie_id/series_id/episode_id must be set
    DB::statement('ALTER TABLE video_likes ADD CONSTRAINT video_likes_only_one_target CHECK (
      (movie_id IS NOT NULL AND series_id IS NULL AND episode_id IS NULL) OR
      (movie_id IS NULL AND series_id IS NOT NULL AND episode_id IS NULL) OR
      (movie_id IS NULL AND series_id IS NULL AND episode_id IS NOT NULL)
    )');

    Schema::create('video_ratings', function (Blueprint $table) {
      $table->uuid('id')->primary();
      $table->foreignUuid('movie_id')->nullable()->constrained('movies')->onDelete('cascade');
      $table->foreignUuid('series_id')->nullable()->constrained('tv_series')->onDelete('cascade');
      $table->foreignUuid('episode_id')->nullable()->constrained('tv_episodes')->onDelete('cascade');
      $table->foreignUuid('user_id')->constrained()->onDelete('cascade');
      $table->enum('rateable_type', ['movie', 'series', 'episode'])->nullable();
      $table->integer('rating');
      $table->timestamps();

      // Unique constraint - user can only rate once
      $table->unique(['movie_id', 'user_id']);
      $table->unique(['series_id', 'user_id']);
      $table->unique(['episode_id', 'user_id']);
    });
    // Postgres check constraints: only one target set and rating between 1 and 5
    DB::statement('ALTER TABLE video_ratings ADD CONSTRAINT video_ratings_only_one_target CHECK (
      (movie_id IS NOT NULL AND series_id IS NULL AND episode_id IS NULL) OR
      (movie_id IS NULL AND series_id IS NOT NULL AND episode_id IS NULL) OR
      (movie_id IS NULL AND series_id IS NULL AND episode_id IS NOT NULL)
    )');
    DB::statement('ALTER TABLE video_ratings ADD CONSTRAINT video_ratings_rating_range CHECK (
      rating >= 1 AND rating <= 5
    )');
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('comments');
    Schema::dropIfExists('comment_likes');
    Schema::dropIfExists('video_likes');
    Schema::dropIfExists('video_ratings');
  }
};
