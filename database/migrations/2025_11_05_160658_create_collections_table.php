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
    Schema::create('collections', function (Blueprint $table) {
      $table->uuid('id')->primary();
      $table->integer('tmdb_id')->nullable();
      $table->string('name')->nullable();
      $table->string('original_name')->nullable();
      $table->text('overview')->nullable();
      $table->text('poster_path')->nullable();
      $table->text('backdrop_path')->nullable();
      $table->string('original_language')->nullable();
      $table->boolean('adult')->default(false);
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('collections');
  }
};
