<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovieCredit extends Model
{
  /** @use HasFactory<\Database\Factories\MovieCreditFactory> */
  use HasFactory, HasUuids;

  protected $fillable = [
    'id',
    'movie_id',
    'credit_id',
    'department',
    'job',
    'character',
    'order',
  ];
  protected $casts = [
    'order' => 'integer',
  ];
  public function movie()
  {
    return $this->belongsTo(Movie::class, 'movie_id', 'id');
  }
  public function credit()
  {
    return $this->belongsTo(Credit::class, 'credit_id', 'id');
  }

  public function getCreatedAtColumn()
  {
    return 'created_at';
  }
}
