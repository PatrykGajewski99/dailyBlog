<?php

declare(strict_types=1);

namespace App\Http\Services;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function add(array $attributes): User
    {
        return User::query()->create([
                'first_name'    => $attributes['first_name'],
                'last_name'     => $attributes['last_name'],
                'phone_number'  => $attributes['phone_number'],
                'email'         => $attributes['email'],
                'country'       => $attributes['country'],
                'town'          => $attributes['town'] ?? null,
                'password'      => Hash::make($attributes['password']),
        ]);
    }

    public function login(User $user, array $credentials): JsonResponse
    {
        if (Auth::attempt($credentials)) {
            $user->createToken('api token')->plainTextToken;

            return new JsonResponse(['message' => 'Log in successfully'], 200);
        }

        return new JsonResponse(['message' => 'Credentials are wrong'], 401);
    }
}
