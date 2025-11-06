<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TvSeriesCreated extends Model
{
  /** @use HasFactory<\Database\Factories\TvSeriesCreatedFactory> */
  use HasFactory, HasUuids;

  protected $fillable = [
    'id',
    'tv_series_id',
    'credit_id',
  ];
  protected $casts = [
    'tv_series_id' => 'uuid',
    'credit_id' => 'uuid',
  ];
  public function series()
  {
    return $this->belongsTo(TvSeries::class, 'tv_series_id');
  }
  public function credit()
  {
    return $this->belongsTo(Credit::class, 'credit_id');
  }
}
