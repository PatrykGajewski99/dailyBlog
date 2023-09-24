<?php

namespace App\Http\Repositories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;

class PostRepository
{
    public function getUserPosts(string $userId): Collection
    {
        return Post::query()
            ->where('user_id', $userId)
            ->get();
    }
}
