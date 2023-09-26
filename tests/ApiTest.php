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

   public function deld(?User $user = null, string $uri, array $data = [], int $expectedStatus = 204): TestResponse
   {
       $response = $user ? $this->actingAs($user)->delete($uri, $data) : $this->delete($uri, $data);

       $expectedStatus !== $response->getStatusCode()
           ? $response->json()
           : $response->assertStatus($expectedStatus);

       return $response;
   }

    public function getd(?User $user = null, string $uri, array $data = [], int $expectedStatus = 200): TestResponse
    {
        $response = $user ? $this->actingAs($user)->get($uri, $data) : $this->get($uri, $data);

        $expectedStatus !== $response->getStatusCode()
            ? $response->json()
            : $response->assertStatus($expectedStatus);

        return $response;
    }
}
