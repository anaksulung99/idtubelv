<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TvSeriesCompany extends Model
{
  /** @use HasFactory<\Database\Factories\TvSeriesCompanyFactory> */
  use HasFactory, HasUuids;

  protected $fillable = [
    'id',
    'tv_series_id',
    'company_id',
  ];
  protected $casts = [
    'id' => 'uuid',
    'tv_series_id' => 'uuid',
    'company_id' => 'uuid',
  ];
  protected $dates = ['created_at', 'updated_at'];
  public function series()
  {
    return $this->belongsTo(TvSeries::class);
  }
  public function company()
  {
    return $this->belongsTo(Company::class);
  }
}
