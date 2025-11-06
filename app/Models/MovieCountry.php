<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovieCountry extends Model
{
  /** @use HasFactory<\Database\Factories\MovieCountryFactory> */
  use HasFactory, HasUuids;

  protected $fillable = [
    'id',
    'country_id',
    'movie_id',
  ];
  protected $casts = [
    'country_id' => 'uuid',
    'movie_id' => 'uuid',
  ];
  protected $dates = ['created_at', 'updated_at'];
  public function movie()
  {
    return $this->belongsTo(Movie::class);
  }
  public function country()
  {
    return $this->belongsTo(Country::class);
  }
}
