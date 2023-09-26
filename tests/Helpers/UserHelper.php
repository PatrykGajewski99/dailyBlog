<?php

namespace Tests\Helpers;

use App\Models\User;
use App\Models\ValueObjects\CountryNames;

class UserHelper
{
    public static function create(?CountryNames $country = null): User
    {
        $user = User::factory()->create();

        if ($country) {
            $user->country = $country;
        }

        $user->save();

        return $user;
    }
}
