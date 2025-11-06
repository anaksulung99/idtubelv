<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovieGenre extends Model
{
  /** @use HasFactory<\Database\Factories\MovieGenreFactory> */
  use HasFactory, HasUuids;

  protected $fillable = [
    'id',
    'genre_id',
    'movie_id',
  ];
  protected $casts = [
    'genre_id' => 'uuid',
    'movie_id' => 'uuid',
  ];
  protected $dates = ['created_at', 'updated_at'];
  public function movie()
  {
    return $this->belongsTo(Movie::class);
  }
  public function genre()
  {
    return $this->belongsTo(Genre::class);
  }
}
