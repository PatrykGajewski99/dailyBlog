<?php

namespace App\Http\Controllers\Posts;

use App\Http\Requests\Post\GetPostRequest;
use App\Models\Post;
use Illuminate\Http\JsonResponse;

class GetPostController
{

    /**
     * Get post
     *
     * @group Post
     *
     * @param GetPostRequest $request
     * @param Post $post
     * @return JsonResponse
     */
    public function __invoke(GetPostRequest $request, Post $post): JsonResponse
    {
        return new JsonResponse($post);
    }
}
