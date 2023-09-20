<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Repositories\UserRepository;
use App\Http\Requests\Customer\LoginRequest;
use App\Http\Services\UserService;
use Illuminate\Http\JsonResponse;

class LoginController extends Controller
{
    public function __construct(private readonly UserService $userService, private readonly UserRepository $userRepository)
    {
    }

    /**
     * Login User
     *
     * @group User
     *
     * @param LoginRequest $request
     * @return JsonResponse
     */
    public function __invoke(LoginRequest $request): JsonResponse
    {
        $user = $this->userRepository->getByEmail($request->email);

        return $this->userService->login($user, $request->validated());
    }
}
