<?php

namespace App\Http\Controllers\Customer;

use App\Http\Requests\DeleteUserRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class DeleteUserController
{

    /**
     * Delete account
     *
     * @group User
     *
     * @param DeleteUserRequest $request
     * @param User $user
     * @return JsonResponse
     */
    public function __invoke(DeleteUserRequest $request, User $user): JsonResponse
    {
        $user->delete();

        return new JsonResponse([], 204);
    }
}
