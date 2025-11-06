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
    Schema::create('videos', function (Blueprint $table) {
      $table->uuid('id')->primary();
      $table->text('original_id')->nullable();
      $table->string('name')->nullable();
      $table->text('video_url')->nullable();
      $table->string('key')->nullable();
      $table->string('type')->nullable();
      $table->string('site')->nullable();
      $table->integer('size')->unsigned()->nullable();
      $table->boolean('official')->default(false);
      $table->string('iso_639_1')->nullable();
      $table->string('iso_3166_1')->nullable();
      $table->dateTime('published_at')->nullable();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('videos');
  }
};
