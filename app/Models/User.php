<?php

namespace App\Models;

use App\Models\ValueObjects\CountryNames;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasUuids, HasApiTokens, HasFactory, Notifiable;

    protected $guarded = [];

    protected $casts = [
      'country' => CountryNames::class,
    ];

    protected $hidden = [
      'password', 'remember_token'
    ];

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
}
