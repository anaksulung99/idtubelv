<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
  /** @use HasFactory<\Database\Factories\MovieFactory> */
  use HasFactory, HasUuids;

  protected $fillable = [
    'id',
    'tmdb_id',
    'imdb_id',
    'title',
    'overview',
    'original_title',
    'tagline',
    'poster_path',
    'backdrop_path',
    'release_date',
    'original_language',
    'origin_country',
    'homepage',
    'status',
    'adult',
    'video',
    'budget',
    'revenue',
    'runtime',
    'vote_average',
    'vote_count',
    'popularity',
  ];

  protected $casts = [
    'adult' => 'boolean',
    'video' => 'boolean',
    'origin_country' => 'array',
  ];
  protected $dates = [
    'release_date',
  ];
  public function videos()
  {
    return $this->belongsToMany(MovieVideo::class, 'movie_videos', 'movie_id', 'video_id')
      ->withTimestamps();
  }
  public function collections()
  {
    return $this->belongsTo(Collection::class);
  }
  public function genres()
  {
    return $this->belongsToMany(Genre::class, 'movie_genres', 'movie_id', 'genre_id')->withTimestamps();
  }
  public function countries()
  {
    return $this->belongsToMany(Country::class, 'movie_countries', 'movie_id', 'country_id')
      ->withTimestamps();
  }
  public function companies()
  {
    return $this->belongsToMany(Company::class, 'movie_companies', 'movie_id', 'company_id')
      ->withTimestamps();
  }
  public function languages()
  {
    return $this->belongsToMany(Language::class, 'movie_languages', 'movie_id', 'language_id')
      ->withTimestamps();
  }
  public function persons()
  {
    return $this->belongsToMany(Person::class, 'movie_persons', 'movie_id', 'person_id')
      ->withTimestamps();
  }
  public function credits()
  {
    return $this->belongsToMany(Credit::class, 'movie_credits', 'movie_id', 'credit_id')
      ->withPivot('department', 'job', 'character', 'order')
      ->withTimestamps();
  }
  public function actors()
  {
    return $this->belongsToMany(Credit::class, 'movie_credits', 'movie_id', 'credit_id')
      ->wherePivot('department', 'cast')
      ->withPivot('character', 'order')
      ->orderBy('pivot_order');
  }
  public function directors()
  {
    return $this->belongsToMany(Credit::class, 'movie_credits', 'movie_id', 'credit_id')
      ->wherePivot('department', 'crew')
      ->wherePivot('job', 'Director')
      ->withPivot('job');
  }

  public function crew()
  {
    return $this->belongsToMany(Credit::class, 'movie_credits', 'movie_id', 'credit_id')
      ->wherePivot('department', 'crew')
      ->withPivot('job');
  }
  public function movieTitle()
  {
    return $this->title;
  }
  public function getPosterUrlAttribute(): ?string
  {
    return $this->poster_path ? 'https://image.tmdb.org/t/p/w500' . $this->poster_path : null;
  }

  public function getBackdropUrlAttribute(): ?string
  {
    return $this->backdrop_path ? 'https://image.tmdb.org/t/p/w1280' . $this->backdrop_path : null;
  }
}
