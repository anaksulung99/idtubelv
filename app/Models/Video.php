<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
  /** @use HasFactory<\Database\Factories\VideoFactory> */
  use HasFactory, HasUuids;

  protected $fillable = [
    'id',
    'original_id',
    'name',
    'video_url',
    'key',
    'type',
    'site',
    'size',
    'official',
    'iso_639_1',
    'iso_3166_1',
    'published_at',
  ];
  protected $casts = [
    'official' => 'boolean',
    'size' => 'integer',
    'published_at' => 'datetime',
  ];
  protected $dates = ['created_at', 'updated_at'];
  public function videos()
  {
    return $this->belongsToMany(MovieVideo::class, 'movie_videos', 'video_id', 'movie_id')
      ->withTimestamps();
  }
  public function isYoutube(string $video_id): bool
  {
    return $this->site === 'YouTube' && $this->original_id === $video_id;
  }
  public function isClip(string $video_id): bool
  {
    return $this->type === 'Clip' && $this->original_id === $video_id;
  }
  public function isStreamUrl(string $video_id): bool
  {
    return $this->type === 'Stream' && $this->original_id === $video_id;
  }
  public function publishedAt(string $video_id): bool
  {
    return $this->published_at->format('Y-m-d H:i:s') === $video_id;
  }
}
