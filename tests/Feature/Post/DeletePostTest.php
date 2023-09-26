<?php

namespace Tests\Feature\Post;

use App\Models\ValueObjects\PostCategories;
use Tests\ApiTest;
use Tests\Helpers\PostHelper;
use Tests\Helpers\UserHelper;

class DeletePostTest extends ApiTest
{
    public function setUp(): void
    {
        parent::setUp();

        $this->user = UserHelper::create();

        $this->actingAs($this->user);

        $this->post = PostHelper::create($this->user, PostCategories::FOOD);
    }

    public function test_it_delete_own_post(): void
    {
        $this->assertDatabaseHas('posts', [
            'id'        => $this->post->id,
            'category'  => PostCategories::FOOD->value,
        ]);

        $this->deld($this->user, "api/post/{$this->post->id}/delete");

        $this->assertDatabaseMissing('posts', [
            'id'        => $this->post->id,
            'category'  => PostCategories::FOOD->value,
        ]);
    }

    public function test_it_returns_error_on_delete_other_user_post(): void
    {
        $secondUser = UserHelper::create();

        $this->assertDatabaseHas('posts', [
            'id'        => $this->post->id,
            'category'  => PostCategories::FOOD->value,
        ]);

        $this->deld($secondUser, "api/post/{$this->post->id}/delete", expectedStatus: 403);
    }
}
