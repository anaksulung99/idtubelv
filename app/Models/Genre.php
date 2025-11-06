<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
  /** @use HasFactory<\Database\Factories\GenreFactory> */
  use HasFactory, HasUuids;

  protected $fillable = ['id', 'tmdb_id', 'name'];

  protected $casts = [
    'tmdb_id' => 'integer',
  ];
  protected $dates = ['created_at', 'updated_at'];

  public function movies()
  {
    return $this->belongsToMany(Movie::class, 'movie_genres', 'genre_id', 'movie_id')
      ->withTimestamps();
  }
}
