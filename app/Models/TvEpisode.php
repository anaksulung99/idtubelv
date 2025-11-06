<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TvEpisode extends Model
{
  /** @use HasFactory<\Database\Factories\TvEpisodeFactory> */
  use HasFactory, HasUuids;

  protected $fillable = [
    'id',
    'tv_season_id',
    'tmdb_id',
    'name',
    'overview',
    'still_path',
    'air_date',
    'episode_number',
    'season_number',
    'episode_type',
    'production_code',
    'runtime',
    'vote_average',
    'vote_count',
    'crew', // JSON field
    'guest_stars', // JSON field
  ];
  protected $casts = [
    'vote_average' => 'float',
    'vote_count' => 'integer',
    'runtime' => 'integer',
    'episode_number' => 'integer',
    'season_number' => 'integer',
    'air_date' => 'date',
    'crew' => 'array',
    'guest_stars' => 'array',
  ];
  protected $dates = [
    'air_date',
  ];
  public function season(): BelongsTo
  {
    return $this->belongsTo(TvSeason::class, 'tv_season_id');
  }

  public function series(): BelongsTo
  {
    return $this->belongsTo(TvSeries::class, 'tv_series_id');
  }
  public function getCrewByDepartment(string $department): array
  {
    return collect($this->crew ?? [])
      ->where('department', $department)
      ->values()
      ->toArray();
  }
  public function getDirectors(): array
  {
    return $this->getCrewByDepartment('Directing');
  }

  public function getWriters(): array
  {
    return $this->getCrewByDepartment('Writing');
  }

  public function getActors(): array
  {
    return $this->guest_stars ?? [];
  }
  public function getStillUrlAttribute(): ?string
  {
    return $this->still_path ? 'https://image.tmdb.org/t/p/w400' . $this->still_path : null;
  }
}
