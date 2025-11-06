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
    Schema::create('movie_collections', function (Blueprint $table) {
      $table->uuid('id')->primary();
      $table->foreignUuid('movie_id')->nullable()->constrained('movies', 'id')->onDelete('set null');
      $table->foreignUuid('collection_id')->nullable()->constrained('collections', 'id')->onDelete('set null');
      // Ensure uniqueness of movie/collection pair without conflicting with the UUID primary key
      $table->unique(['movie_id', 'collection_id']);
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('movie_collections');
  }
};
