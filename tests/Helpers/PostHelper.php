<?php

declare(strict_types=1);

namespace Tests\Helpers;

use App\Models\Post;
use App\Models\User;
use App\Models\ValueObjects\PostCategories;

class PostHelper
{
    public static function create(?User $user = null, ?PostCategories $category = null): Post
    {
        $customer = $user ?? UserHelper::create();

        $post = Post::factory()->make([
            'user_id' => $customer->id,
        ]);

        if ($category) {
            $post->category = $category;
        }

        $post->save();

        return $post;
    }
}
