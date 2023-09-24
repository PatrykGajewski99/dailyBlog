<?php

declare(strict_types=1);

namespace App\Http\Controllers\Posts;

use App\Http\Requests\Post\AddPostRequest;
use App\Http\Services\PostService;
use Illuminate\Http\JsonResponse;

class AddPostController
{
    public function __construct(private readonly PostService $postService)
    {
    }

    /**
     * Add blog post
     *
     * @group Post
     *
     * @param AddPostRequest $request
     * @return JsonResponse
     */
    public function __invoke(AddPostRequest $request): JsonResponse
    {
        return new JsonResponse($this->postService->add($request->validated()));
    }
}
