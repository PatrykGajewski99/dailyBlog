<?php

namespace App\Http\Controllers\Posts;

use App\Http\Repositories\PostRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class ListUserPostsController
{
    public function __construct(private readonly PostRepository $postRepository)
    {
    }

    /**
     * List user posts
     *
     * @group User
     *
     * @return JsonResponse
     */
    public function __invoke(): JsonResponse
    {
        return new JsonResponse($this->postRepository->getUserPosts(Auth::user()->getAuthIdentifier()));
    }
}
