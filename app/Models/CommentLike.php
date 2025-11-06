<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CommentLike extends Model
{
  use HasUuids;

  protected $fillable = [
    'id',
    'user_id',
    'comment_id',
  ];
  protected $casts = [
    'id' => 'uuid',
    'user_id' => 'uuid',
    'comment_id' => 'uuid',
  ];

  public function user(): BelongsTo
  {
    return $this->belongsTo(User::class);
  }
  public function comment(): BelongsTo
  {
    return $this->belongsTo(Comment::class);
  }
}
