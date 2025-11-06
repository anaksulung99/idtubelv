<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
  /** @use HasFactory<\Database\Factories\LanguageFactory> */
  use HasFactory, HasUuids;

  protected $fillable = ['id', 'iso_639_1', 'english_name', 'name'];

  protected $casts = [
    'iso_639_1' => 'string',
  ];
  public function movieLanguages()
  {
    return $this->belongsToMany(MovieLanguage::class, 'movie_languages', 'language_id', 'movie_id');
  }
  public function tvSeriesLanguages()
  {
    return $this->belongsToMany(TvSeriesLanguage::class, 'tv_series_languages', 'language_id', 'tv_series_id');
  }
}
