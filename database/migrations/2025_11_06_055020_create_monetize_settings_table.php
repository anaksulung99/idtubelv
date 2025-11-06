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
    Schema::create('monetize_settings', function (Blueprint $table) {
      $table->uuid('id')->primary();
      $table->string('key')->unique();
      $table->text('value')->nullable();
      $table->boolean('is_enabled')->default(false);
      $table->timestamps();
    });
    $settings = [
      // Header Affiliate Code
      ['key' => 'header_affiliate_code', 'value' => null, 'is_enabled' => false],

      // Offer Links
      ['key' => 'offer_link_1', 'value' => null, 'is_enabled' => true],
      ['key' => 'offer_link_2', 'value' => null, 'is_enabled' => true],

      // Banner Ads - Horizontal
      ['key' => 'banner_horizontal_small', 'value' => null, 'is_enabled' => false],
      ['key' => 'banner_horizontal_large', 'value' => null, 'is_enabled' => false],

      // Banner Ads - Rectangle
      ['key' => 'banner_rectangle_small', 'value' => null, 'is_enabled' => false],
      ['key' => 'banner_rectangle_large', 'value' => null, 'is_enabled' => false],

      // Banner Ads - Native
      ['key' => 'banner_native_1', 'value' => null, 'is_enabled' => false],
      ['key' => 'banner_native_2', 'value' => null, 'is_enabled' => false],

      // Special Ads
      ['key' => 'banner_popup_centered', 'value' => null, 'is_enabled' => false],
      ['key' => 'banner_bottom_sticky', 'value' => null, 'is_enabled' => false],
      ['key' => 'banner_header_sticky', 'value' => null, 'is_enabled' => false],
    ];
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('monetize_settings');
  }
};
