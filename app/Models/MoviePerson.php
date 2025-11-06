<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MoviePerson extends Model
{
  /** @use HasFactory<\Database\Factories\MoviePersonFactory> */
  use HasFactory, HasUuids;

  protected $fillable = [
    'id',
    'movie_id',
  ];
  protected $casts = [
    'order' => 'integer',
  ];
  public function movie()
  {
    return $this->belongsTo(Movie::class, 'movie_id', 'id');
  }
  public function person()
  {
    return $this->belongsTo(Person::class, 'person_id', 'id');
  }
}
