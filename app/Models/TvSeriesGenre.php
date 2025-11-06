<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TvSeriesGenre extends Model
{
  /** @use HasFactory<\Database\Factories\TvSeriesGenreFactory> */
  use HasFactory, HasUuids;

  protected $fillable = [
    'id',
    'genre_id',
    'tv_series_id',
  ];
  protected $casts = [
    'id' => 'uuid',
    'genre_id' => 'uuid',
    'tv_series_id' => 'uuid',
  ];
  protected $dates = ['created_at', 'updated_at'];
  public function series()
  {
    return $this->belongsTo(TvSeries::class, 'tv_series_id', 'id');
  }
  public function genre()
  {
    return $this->belongsTo(Genre::class, 'genre_id', 'id');
  }
}
