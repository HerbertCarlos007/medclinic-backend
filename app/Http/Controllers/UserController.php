<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\StoreUserRequest;
use App\Http\Resources\UserResource;
use App\Models\Clinic;
use App\Services\UserService;

class UserController extends Controller
{
    public function __construct(
        protected UserService $userService
    ) {}

    public function store(StoreUserRequest $request)
    {
        $user = $this->userService->store($request);

        return response()->json([
            'user' => new UserResource($user),
            'access_token' => $user->token,
            'token_type' => 'Bearer',
        ]);
    }

    public function indexByClinic(Clinic $clinic)
    {
        $users = $this->userService->indexByClinic($clinic);

        return UserResource::collection($users);
    }
}
