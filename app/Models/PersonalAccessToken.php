<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use Laravel\Sanctum\PersonalAccessToken as SanctumPersonalAccessToken;

class PersonalAccessToken extends SanctumPersonalAccessToken
{
    use HasFactory, HasUuids;

    public $incrementing = false;

    protected $guarded = [];

    public static function boot()
    {
        parent::boot();

        static::creating(fn ($model) => $model->id = (string) Str::uuid());
    }
}
