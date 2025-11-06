<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timezone extends Model
{
  /** @use HasFactory<\Database\Factories\TimezoneFactory> */
  use HasFactory;

  protected $fillable = ['id', 'iso_3166_1', 'zones'];

  protected $casts = [
    'zones' => 'array',
  ];
}
