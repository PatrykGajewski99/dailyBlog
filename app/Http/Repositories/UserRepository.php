<?php

declare(strict_types=1);

namespace App\Http\Repositories;

use App\Models\User;

class UserRepository
{
    public function getByEmail(string $email): ?User
    {
        return User::query()
            ->where('email', '=', $email)
            ->first();
    }
}
