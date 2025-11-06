<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovieVideo extends Model
{
  /** @use HasFactory<\Database\Factories\MovieVideoFactory> */
  use HasFactory, HasUuids;

  protected $fillable = [
    'id',
    'video_id',
    'movie_id',
  ];
  protected $casts = [
    'created_at' => 'datetime',
    'updated_at' => 'datetime',
  ];
  public function movie()
  {
    return $this->belongsTo(Movie::class);
  }
  public function video()
  {
    return $this->belongsTo(Video::class);
  }
}
