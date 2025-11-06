<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TvSeriesLanguage extends Model
{
  /** @use HasFactory<\Database\Factories\TvSeriesLanguageFactory> */
  use HasFactory, HasUuids;

  protected $fillable = [
    'id',
    'tv_series_id',
    'language_id',
  ];
  protected $casts = [
    'id' => 'uuid',
    'tv_series_id' => 'uuid',
    'language_id' => 'uuid',
  ];
  protected $dates = ['created_at', 'updated_at'];
  public function series()
  {
    return $this->belongsTo(TvSeries::class);
  }
  public function language()
  {
    return $this->belongsTo(Language::class);
  }
}
