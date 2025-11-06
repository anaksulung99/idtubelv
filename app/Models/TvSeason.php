<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TvSeason extends Model
{
  /** @use HasFactory<\Database\Factories\TvSeasonFactory> */
  use HasFactory, HasUuids;

  protected $fillable = [
    'id',
    'tv_series_id',
    'tmdb_id',
    'season_id',
    'name',
    'poster_path',
    'overview',
    'air_date',
    'season_number',
    'vote_average',
    'episode_count',
  ];
  protected $casts = [
    'vote_average' => 'float',
    'air_date' => 'date',
    'season_number' => 'integer',
    'episode_count' => 'integer',
  ];


  public function series(): BelongsTo
  {
    return $this->belongsTo(TvSeries::class, 'tv_series_id');
  }

  public function episodes(): HasMany
  {
    return $this->hasMany(TvEpisode::class, 'tv_season_id');
  }
  public function getPosterUrlAttribute(): ?string
  {
    return $this->poster_path ? 'https://image.tmdb.org/t/p/w500' . $this->poster_path : null;
  }
}
