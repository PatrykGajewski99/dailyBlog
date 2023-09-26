<?php

namespace Tests\Feature\Post;

use App\Models\ValueObjects\PostCategories;
use Tests\ApiTest;
use Tests\Helpers\PostHelper;
use Tests\Helpers\UserHelper;

class EditPostTest extends ApiTest
{
    public function test_it_edit_own_post(): void
    {
        $user = UserHelper::create();

        $this->actingAs($user);

        $post = PostHelper::create($user, PostCategories::FOOD);

        $this->assertDatabaseHas('posts', [
            'id'        => $post->id,
            'category'  => PostCategories::FOOD->value,
        ]);

        $data = [
            'category' => PostCategories::BEAUTY->value,
        ];

        $this->patchd($user, "api/post/{$post->id}/edit", $data);

        $this->assertDatabaseHas('posts', [
            'id'        => $post->id,
            'category'  => PostCategories::BEAUTY->value,
        ]);
    }

    public function test_id_return_error_on_edit_other_user_post(): void
    {
        $user = UserHelper::create();
        $secondUser = UserHelper::create();

        $this->actingAs($user);

        $post = PostHelper::create($user, PostCategories::FOOD);

        $this->assertDatabaseHas('posts', [
            'id'        => $post->id,
            'category'  => PostCategories::FOOD->value,
        ]);

        $data = [
            'category' => PostCategories::BEAUTY->value,
        ];

        $this->patchd($secondUser,"api/post/{$post->id}/edit", $data, 403);

        $this->assertDatabaseMissing('posts', [
            'id'        => $post->id,
            'category'  => PostCategories::BEAUTY->value,
        ]);
    }
}
