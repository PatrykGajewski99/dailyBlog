<?php

namespace App\Http\Controllers\Posts;

use App\Http\Requests\Post\UpdatePostRequest;
use App\Http\Services\PostService;
use App\Models\Post;
use Illuminate\Http\JsonResponse;

class UpdatePostController
{
    public function __construct(private readonly PostService $postService)
    {
    }

    /**
     * Update post
     *
     * @group Post
     *
     * @param UpdatePostRequest $request
     * @param Post $post
     * @return JsonResponse
     *
     * @responseFile resources/blog_post.json
     */
    public function __invoke(UpdatePostRequest $request, Post $post): JsonResponse
    {
        return new JsonResponse($this->postService->update($post, $request->validated()));
    }
}
