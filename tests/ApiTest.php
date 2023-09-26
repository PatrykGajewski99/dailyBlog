<?php

namespace Tests;

use App\Models\User;
use Illuminate\Testing\TestResponse;

class ApiTest extends TestCase
{
    public function patchd(?User $user = null, string $uri, array $data = [], int $expectedStatus = 200): TestResponse
    {
        $response = $user ? $this->actingAs($user)->patch($uri, $data) : $this->patch($uri, $data);

        $expectedStatus !== $response->getStatusCode()
            ? $response->json()
            : $response->assertStatus($expectedStatus);

        return $response;
   }
}
