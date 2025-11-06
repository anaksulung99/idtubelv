<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
  /** @use HasFactory<\Database\Factories\SettingFactory> */
  use HasFactory, HasUuids;

  protected $fillable = ['id', 'key', 'value', 'type'];

  public static function get($key, $default = null)
  {
    $setting = self::where('key', $key)->first();
    return $setting ? $setting->value : $default;
  }

  public static function set($key, $value)
  {
    return self::updateOrCreate(
      ['key' => $key],
      ['value' => $value]
    );
  }
}
