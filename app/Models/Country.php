<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
  /** @use HasFactory<\Database\Factories\CountryFactory> */
  use HasFactory, HasUuids;

  protected $fillable = ['id', 'iso_3166_1', 'english_name', 'native_name'];

  protected $casts = [
    'iso_3166_1' => 'string',
  ];
  protected $dates = ['created_at', 'updated_at'];

  public function movies()
  {
    return $this->belongsToMany(Movie::class, 'movie_countries', 'country_id', 'movie_id')
      ->withTimestamps();
  }
}
