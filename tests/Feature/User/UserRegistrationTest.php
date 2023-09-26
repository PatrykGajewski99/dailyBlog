<?php

namespace Tests\Feature\User;

use App\Models\ValueObjects\CountryNames;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class UserRegistrationTest extends TestCase
{
    use DatabaseMigrations;

    public function test_it_user_registration(): void
    {
        $firstUserData = [
            'first_name' => 'Patryk',
            'last_name' => 'Gajewski',
            'phone_number' => '777777777',
            'email' => 'pgajewsk999@gmail.com',
            'country' => CountryNames::PORTUGAL->value,
            'password' => 'Qwerty123!',
            'password_confirmation' => 'Qwerty123!',
        ];

        $secondUserData = [
            'first_name' => 'Patryk',
            'last_name' => 'Gajewski',
            'phone_number' => '777777777',
            'email' => 'pgajewsk999@gmail.com',
            'country' => CountryNames::PORTUGAL->value,
            'password' => 'Qwerty123!',
            'password_confirmation' => 'Qwerty123!',
        ];

        $response = $this->postJson('api/user/register', $firstUserData);

        $response->assertStatus(201);

        $this->assertDatabaseHas('users', [
            'first_name' => 'Patryk',
            'email' => 'pgajewsk999@gmail.com',
        ]);

        $response = $this->postJson('api/user/register', $secondUserData);

        $response->assertStatus(422);
    }
}
