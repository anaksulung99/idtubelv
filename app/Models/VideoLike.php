<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VideoLike extends Model
{
  use HasUuids;

  protected $fillable = [
    'id',
    'movie_id',
    'series_id',
    'episode_id',
    'user_id',
    'ip_address',
    'likeable_type',
  ];
  protected $casts = [
    'id' => 'uuid',
    'user_id' => 'uuid',
    'video_id' => 'uuid',
    'likeable_type' => 'string',
  ];

  public function movie(): BelongsTo
  {
    return $this->belongsTo(Movie::class);
  }

  public function series(): BelongsTo
  {
    return $this->belongsTo(TvSeries::class);
  }

  public function episode(): BelongsTo
  {
    return $this->belongsTo(TvEpisode::class);
  }

  public function user(): BelongsTo
  {
    return $this->belongsTo(User::class);
  }

  public function getLikeableAttribute()
  {
    return match ($this->likeable_type) {
      'movie' => $this->movie,
      'series' => $this->series,
      'episode' => $this->episode,
      default => null
    };
  }
}
