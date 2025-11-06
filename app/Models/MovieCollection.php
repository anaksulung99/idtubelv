<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovieCollection extends Model
{
  /** @use HasFactory<\Database\Factories\MovieCollectionFactory> */
  use HasFactory, HasUuids;

  protected $fillable = [
    'id',
    'collection_id',
    'movie_id',
  ];
  protected $casts = [
    'collection_id' => 'uuid',
    'movie_id' => 'uuid',
  ];
  protected $dates = ['created_at', 'updated_at'];
  public function movie()
  {
    return $this->belongsTo(Movie::class);
  }
  public function collection()
  {
    return $this->belongsTo(Collection::class);
  }
}
