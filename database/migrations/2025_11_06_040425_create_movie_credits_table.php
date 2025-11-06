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
    Schema::create('movie_credits', function (Blueprint $table) {
      $table->uuid('id')->primary();
      $table->foreignUuid('movie_id')->constrained('movies', 'id')->onDelete('cascade');
      $table->foreignUuid('credit_id')->constrained('credits', 'id')->onDelete('cascade');
      $table->string('department')->nullable();
      $table->string('job')->nullable();
      $table->string('character')->nullable();
      $table->integer('order')->nullable();
      $table->primary(['movie_id', 'credit_id']);
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('movie_credits');
  }
};
