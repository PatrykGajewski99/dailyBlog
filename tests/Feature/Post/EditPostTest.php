<?php

namespace Tests\Feature\Post;

use App\Models\ValueObjects\PostCategories;
use Tests\ApiTest;
use Tests\Helpers\PostHelper;
use Tests\Helpers\UserHelper;

class EditPostTest extends ApiTest
{
    public function setUp(): void
    {
        parent::setUp();

        $this->user = UserHelper::create();

        $this->actingAs($this->user);

        $this->post = PostHelper::create($this->user, PostCategories::FOOD);

        $this->assertDatabaseHas('posts', [
            'id'        => $this->post->id,
            'category'  => PostCategories::FOOD->value,
        ]);

        $this->data = [
            'category' => PostCategories::BEAUTY->value,
        ];
    }

    public function test_it_edit_own_post(): void
    {
        $this->patchd($this->user, "api/post/{$this->post->id}/edit", $this->data);

        $this->assertDatabaseHas('posts', [
            'id'        => $this->post->id,
            'category'  => PostCategories::BEAUTY->value,
        ]);
    }

    public function test_it_returns_error_on_edit_other_user_post(): void
    {
        $secondUser = UserHelper::create();

        $this->patchd($secondUser,"api/post/{$this->post->id}/edit", $this->data, 403);

        $this->assertDatabaseMissing('posts', [
            'id'        => $this->post->id,
            'category'  => PostCategories::BEAUTY->value,
        ]);
    }
}
