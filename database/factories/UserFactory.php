<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\ValueObjects\CountryNames;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends Factory<User>
 */
class UserFactory extends Factory
{
    public function definition(): array
    {
        return [
            'first_name'        => fake()->firstName(),
            'last_name'         => fake()->lastName(),
            'phone_number'      => fake()->unique()->phoneNumber(),
            'email'             => fake()->unique()->safeEmail(),
            'country'           => fake()->randomElement(CountryNames::getAllowedValues()),
            'town'              => fake()->numberBetween(1,10) < 5 ? fake()->city : null,
            'password'          => Hash::make(fake()->password),
            'remember_token'    => Str::random(10),
        ];
    }
}
