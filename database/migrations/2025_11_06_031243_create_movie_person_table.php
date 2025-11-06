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
    Schema::create('movie_persons', function (Blueprint $table) {
      $table->uuid('id')->primary();
      $table->foreignUuid('movie_id')->constrained('movies', 'id')->onDelete('cascade');
      $table->foreignUuid('person_id')->constrained('persons', 'id')->onDelete('cascade');
      $table->primary(['movie_id', 'person_id']);
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('movie_persons');
  }
};
