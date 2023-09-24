<?php

declare(strict_types=1);

namespace App\Http\Controllers\Posts;

use App\Http\Requests\Post\CreatePostRequest;
use App\Http\Services\PostService;
use Illuminate\Http\JsonResponse;

class CreatePostController
{
    public function __construct(private readonly PostService $postService)
    {
    }

    /**
     * Add blog post
     *
     * @group Post
     *
     * @param CreatePostRequest $request
     * @return JsonResponse
     */
    public function __invoke(CreatePostRequest $request): JsonResponse
    {
        return new JsonResponse($this->postService->add($request->validated()));
    }
}
