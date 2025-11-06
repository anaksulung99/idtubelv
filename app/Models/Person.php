<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
  /** @use HasFactory<\Database\Factories\PersonFactory> */
  use HasFactory, HasUuids;

  protected $fillable = [
    'id',
    'tmdb_id',
    'name',
    'profile_path',
    'gender',
    'adult',
    'known_for_department',
    'popularity',
    'birthday',
    'deathday',
    'place_of_birth',
    'biography',
    'homepage',
  ];
  protected $casts = [
    'adult' => 'boolean',
    'gender' => 'integer',
    'deathday' => 'date',
  ];
  protected $dates = ['created_at', 'updated_at'];
  public function movies()
  {
    return $this->belongsToMany(Movie::class, 'movie_persons', 'person_id', 'movie_id')
      ->withTimestamps();
  }
  public function getProfileUrlAttribute(): ?string
  {
    return $this->profile_path ? 'https://image.tmdb.org/t/p/w300' . $this->profile_path : null;
  }
}
