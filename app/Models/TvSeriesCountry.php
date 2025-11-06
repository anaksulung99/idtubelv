<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TvSeriesCountry extends Model
{
  /** @use HasFactory<\Database\Factories\TvSeriesCountryFactory> */
  use HasFactory, HasUuids;

  protected $fillable = [
    'id',
    'tv_series_id',
    'country_id',
  ];
  protected $casts = [
    'id' => 'uuid',
    'tv_series_id' => 'uuid',
    'country_id' => 'uuid',
  ];
  protected $dates = ['created_at', 'updated_at'];
  public function series()
  {
    return $this->belongsTo(TvSeries::class);
  }
  public function country()
  {
    return $this->belongsTo(Country::class);
  }
}
