<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MovieLanguage extends Model
{
  /** @use HasFactory<\Database\Factories\MovieLanguageFactory> */
  use HasFactory, HasUuids;

  protected $fillable = [
    'id',
    'movie_id',
    'language_id',
  ];
  protected $casts = [
    'id' => 'uuid',
    'movie_id' => 'uuid',
    'language_id' => 'uuid',
  ];
  public function movie(): BelongsTo
  {
    return $this->belongsTo(Movie::class);
  }
  public function language(): BelongsTo
  {
    return $this->belongsTo(Language::class);
  }
}
