<?php

declare(strict_types=1);

namespace App\Http\Services;

use App\Models\Post;

class PostService
{
    public function add(array $attributes): Post
    {
        return Post::query()->create($attributes);
    }

    public function update(Post $post, array $attributes): Post
    {
        $post->update($attributes);

        $post->save();

        return $post;
    }
}
