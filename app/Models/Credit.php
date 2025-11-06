<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Credit extends Model
{
  /** @use HasFactory<\Database\Factories\CreditFactory> */
  use HasFactory, HasUuids;
  protected $fillable = [
    'id',
    'tmdb_id',
    'cast_id',
    'credit_id',
    'name',
    'original_name',
    'profile_path',
    'character',
    'gender',
    'adult',
    'known_for_department',
    'popularity',
    'order',
  ];
  protected $casts = [
    'order' => 'integer',
  ];
  public function movies()
  {
    return $this->belongsToMany(Movie::class, 'movie_credits', 'credit_id', 'movie_id')
      ->withPivot('department', 'job', 'character', 'order')
      ->withTimestamps();
  }
  public function getProfileUrlAttribute(): ?string
  {
    return $this->profile_path ? 'https://image.tmdb.org/t/p/w300' . $this->profile_path : null;
  }
}
