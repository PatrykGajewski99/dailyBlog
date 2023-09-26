<?php

namespace App\Http\Controllers\Posts;

use App\Http\Repositories\PostRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListUserPostsController
{
    public function __construct(private readonly PostRepository $postRepository)
    {
    }

    /**
     * List user posts
     *
     * @group Post
     *
     * @param Request $request
     * @return JsonResponse
     *
     * @responseFile resources/list_user_posts.json
     */
    public function __invoke(Request $request): JsonResponse
    {
        return new JsonResponse($this->postRepository->getUserPosts(Auth::user()->getAuthIdentifier()));
    }
}
