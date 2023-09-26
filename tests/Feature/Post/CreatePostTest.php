<?php

namespace Tests\Feature\Post;

use App\Models\ValueObjects\PostCategories;
use Tests\Helpers\UserHelper;
use Tests\TestCase;

class CreatePostTest extends TestCase
{
    public function test_it_create_post_like_not_login_user(): void
    {
        $data = [
            'category'    => PostCategories::LIFE->value,
            'title'       => 'Sweets are unhealthy',
            'description' => 'Something',
        ];

        $response = $this->postJson('api/post/add', $data);

        $response->assertStatus(401);

        $this->assertDatabaseMissing('posts', [
            'category'    => PostCategories::LIFE->value,
            'title'       => 'Sweets are unhealthy',
            'description' => 'Something',
        ]);
    }

    public function test_it_create_post_like_login_user(): void
    {
        $user = UserHelper::create();

        $data = [
            'category'    => PostCategories::SPORT->value,
            'title'       => 'Running is healthy',
            'description' => 'Something',
            'user_id'     => $user->id,
        ];

        $response = $this->postJson('api/post/add', $data);

        $response->assertStatus(401);

        $this->assertDatabaseMissing('posts', [
            'category'    => PostCategories::SPORT->value,
            'title'       => 'Running is healthy',
            'description' => 'Something',
            'user_id'     => $user->id,
        ]);

        $this->actingAs($user);

        $response = $this->postJson('api/post/add', $data);

        $response->assertStatus(201);

        $this->assertDatabaseHas('posts', [
            'category'    => PostCategories::SPORT->value,
            'title'       => 'Running is healthy',
            'description' => 'Something',
            'user_id'     => $user->id,
        ]);
    }
}
