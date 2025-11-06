<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovieCompany extends Model
{
  /** @use HasFactory<\Database\Factories\MovieCompanyFactory> */
  use HasFactory, HasUuids;

  protected $fillable = [
    'id',
    'company_id',
    'movie_id',
  ];
  protected $casts = [
    'company_id' => 'uuid',
    'movie_id' => 'uuid',
  ];
  protected $dates = ['created_at', 'updated_at'];
  public function movie()
  {
    return $this->belongsTo(Movie::class);
  }
  public function company()
  {
    return $this->belongsTo(Company::class);
  }
}
