<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Comment extends Model
{
  /** @use HasFactory<\Database\Factories\CommentFactory> */
  use HasFactory, HasUuids;

  protected $fillable = [
    'id',
    'user_id',
    'movie_id',
    'series_id',
    'parent_id',
    'commentable_type',
    'content',
    'likes_count',
  ];

  public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function movie(): BelongsTo
    {
        return $this->belongsTo(Movie::class);
    }

    public function series(): BelongsTo
    {
        return $this->belongsTo(TvSeries::class);
    }

    public function episode(): BelongsTo
    {
        return $this->belongsTo(TvEpisode::class);
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Comment::class, 'parent_id');
    }

    public function replies(): HasMany
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }

    public function likes(): HasMany
    {
        return $this->hasMany(CommentLike::class);
    }

    // Helper methods
    public function getCommentableAttribute()
    {
        return match($this->commentable_type) {
            'movie' => $this->movie,
            'series' => $this->series,
            'episode' => $this->episode,
            default => null
        };
    }

    public function isReply(): bool
    {
        return !is_null($this->parent_id);
    }
}