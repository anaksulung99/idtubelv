<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
  /** @use HasFactory<\Database\Factories\CompanyFactory> */
  use HasFactory, HasUuids;

  protected $fillable = [
    'id',
    'tmdb_id',
    'name',
    'logo_path',
    'origin_country',
  ];
  protected $casts = [
    'origin_country' => 'string',
  ];
  protected $dates = ['created_at', 'updated_at'];

  public function movies()
  {
    return $this->belongsToMany(Movie::class, 'movie_companies', 'company_id', 'movie_id')
      ->withTimestamps();
  }
  public function tvSeries()
  {
    return $this->belongsToMany(TvSeries::class, 'tv_series_companies', 'company_id', 'tv_series_id')
      ->withTimestamps();
  }
}
