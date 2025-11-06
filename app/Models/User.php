<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Fortify\TwoFactorAuthenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
  /** @use HasFactory<\Database\Factories\UserFactory> */
  use HasFactory, Notifiable, TwoFactorAuthenticatable, HasUuids;

  /**
   * The attributes that are mass assignable.
   *
   * @var list<string>
   */
  protected $fillable = [
    'id',
    'name',
    'email',
    'password',
    'avatar',
    'phone',
    'role',
    'is_active',
  ];

  /**
   * The attributes that should be hidden for serialization.
   *
   * @var list<string>
   */
  protected $hidden = [
    'password',
    'two_factor_secret',
    'two_factor_recovery_codes',
    'remember_token',
  ];

  /**
   * Get the attributes that should be cast.
   *
   * @return array<string, string>
   */
  protected function casts(): array
  {
    return [
      'email_verified_at' => 'datetime',
      'password' => 'hashed',
      'is_active' => 'boolean',
    ];
  }

  /**
   * Get the user's initials
   */
  public function initials(): string
  {
    return Str::of($this->name)
      ->explode(' ')
      ->take(2)
      ->map(fn($word) => Str::substr($word, 0, 1))
      ->implode('');
  }
  public function isAdmin(): bool
  {
    return $this->role === 'admin';
  }
  public function isUser(): bool
  {
    return $this->role === 'user';
  }
  public function scopeAdmins($query)
  {
    return $query->where('role', 'admin');
  }
  public function scopeUsers($query)
  {
    return $query->where('role', 'user');
  }
}
