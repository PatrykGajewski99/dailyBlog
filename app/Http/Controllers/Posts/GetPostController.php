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
     *
     * @responseFile resources/blog_post.json
     */
    public function __invoke(GetPostRequest $request, Post $post): JsonResponse
    {
        return new JsonResponse($post);
    }
}
