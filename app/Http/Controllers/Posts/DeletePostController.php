<?php

namespace App\Http\Controllers\Posts;

use App\Http\Requests\DeletePostRequest;
use App\Models\Post;
use Illuminate\Http\JsonResponse;

class DeletePostController
{
    /**
     * Delete post
     *
     * @group Post
     *
     * @param DeletePostRequest $request
     * @param Post $post
     * @return JsonResponse
     */
    public function __invoke(DeletePostRequest $request, Post $post): JsonResponse
    {
        $post->delete();

        return new JsonResponse([], 204);
    }
}
