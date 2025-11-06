<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('settings', function (Blueprint $table) {
      $table->uuid('id')->primary();
      $table->string('key')->unique();
      $table->text('value')->nullable();
      $table->string('type')->default('text'); // text, textarea, image, email, etc
      $table->timestamps();
    });
    DB::table('settings')->insert([
      ['key' => 'site_name', 'value' => 'Admin Dashboard', 'type' => 'text', 'created_at' => now(), 'updated_at' => now()],
      ['key' => 'site_description', 'value' => 'Modern Admin Dashboard', 'type' => 'textarea', 'created_at' => now(), 'updated_at' => now()],
      ['key' => 'site_keywords', 'value' => 'admin,dashboard,modern', 'type' => 'text', 'created_at' => now(), 'updated_at' => now()],
      ['key' => 'site_logo', 'value' => 'logo.png', 'type' => 'image', 'created_at' => now(), 'updated_at' => now()],
      ['key' => 'site_favicon', 'value' => 'favicon.ico', 'type' => 'image', 'created_at' => now(), 'updated_at' => now()],
      ['key' => 'site_email', 'value' => 'admin@example.com', 'type' => 'email', 'created_at' => now(), 'updated_at' => now()],
      ['key' => 'site_phone', 'value' => '+62 123 4567 890', 'type' => 'text', 'created_at' => now(), 'updated_at' => now()],
      ['key' => 'site_url', 'value' => 'https://admin.example.com', 'type' => 'text', 'created_at' => now(), 'updated_at' => now()],
      ['key' => 'enable_registration', 'value' => '1', 'type' => 'text', 'created_at' => now(), 'updated_at' => now()],
      ['key' => 'enable_monetization', 'value' => '1', 'type' => 'text', 'created_at' => now(), 'updated_at' => now()],
      ['key' => 'type_monetization', 'value' => 'adsterra', 'type' => 'text', 'created_at' => now(), 'updated_at' => now()],
      ['key' => 'enable_histats', 'value' => '1', 'type' => 'text', 'created_at' => now(), 'updated_at' => now()],
      ['key' => 'histats_script', 'value' => '<script async src="https://www.googletagmanager.com/gtag/js?id=G-1234567890"></script>', 'type' => 'text', 'created_at' => now(), 'updated_at' => now()],
      ['key' => 'is_maintenance', 'value' => '0', 'type' => 'text', 'created_at' => now(), 'updated_at' => now()],
    ]);
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('settings');
  }
};
