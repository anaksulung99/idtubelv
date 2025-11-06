<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TvSeries extends Model
{
  /** @use HasFactory<\Database\Factories\TvSeriesFactory> */
  use HasFactory, HasUuids;

  protected $fillable = [
    'id',
    'tmdb_id',
    'name',
    'original_name',
    'overview',
    'tagline',
    'poster_path',
    'backdrop_path',
    'first_air_date',
    'last_air_date',
    'next_episode_to_air',
    'last_episode_to_air',
    'number_of_seasons',
    'number_of_episodes',
    'original_language',
    'origin_country',
    'homepage',
    'in_production',
    'type',
    'status',
    'adult',
    'vote_average',
    'vote_count',
    'popularity',
  ];

  protected $casts = [
    'origin_country' => 'array',
    'next_episode_to_air' => 'array',
    'last_episode_to_air' => 'array',
    'adult' => 'boolean',
    'in_production' => 'boolean',
    'vote_average' => 'float',
    'vote_count' => 'integer',
    'popularity' => 'float',
    'first_air_date' => 'date',
    'last_air_date' => 'date',
  ];

  public function seasons(): HasMany
  {
    return $this->hasMany(TvSeason::class, 'tv_series_id');
  }

  public function genres(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
  {
    return $this->belongsToMany(Genre::class, 'tv_series_genres', 'tv_series_id', 'genre_id');
  }

  public function companies(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
  {
    return $this->belongsToMany(Company::class, 'tv_series_companies', 'tv_series_id', 'company_id');
  }

  public function countries(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
  {
    return $this->belongsToMany(Country::class, 'tv_series_countries', 'tv_series_id', 'country_id');
  }

  // Accessors
  public function getPosterUrlAttribute(): ?string
  {
    return $this->poster_path ? 'https://image.tmdb.org/t/p/w500' . $this->poster_path : null;
  }

  public function getBackdropUrlAttribute(): ?string
  {
    return $this->backdrop_path ? 'https://image.tmdb.org/t/p/w1280' . $this->backdrop_path : null;
  }
}
