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
    Schema::create('movie_videos', function (Blueprint $table) {
      $table->uuid('id')->primary();
      $table->foreignUuid('video_id')->constrained('videos')->onDelete('cascade');
      $table->foreignUuid('movie_id')->constrained('movies')->onDelete('cascade');
      $table->primary(['video_id', 'movie_id']);
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('movie_videos');
  }
};
