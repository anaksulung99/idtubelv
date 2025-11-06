<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Collection extends Model
{
  /** @use HasFactory<\Database\Factories\CollectionFactory> */
  use HasFactory, HasUuids;

  protected $fillable = [
    'id',
    'tmdb_id',
    'name',
    'original_name',
    'overview',
    'poster_path',
    'backdrop_path',
    'original_language',
    'adult',
  ];
  protected $casts = [
    'adult' => 'boolean',
  ];
  protected $dates = ['created_at', 'updated_at'];

  public function movies(): HasMany
  {
    return $this->hasMany(Movie::class, 'collection_id', 'id');
  }
}
