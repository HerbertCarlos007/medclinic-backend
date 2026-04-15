<?php

namespace App\Http\Controllers;

use App\Http\Requests\Login\StoreLoginRequest;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\Clinic;
use App\Models\User;
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

    public function login(StoreLoginRequest $request)
    {
        $user = $this->userService->login($request);

        if (! $user) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $token = $user->createToken('api_token')->plainTextToken;

        return response()->json([
            'user' => new UserResource($user),
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }

    public function indexByClinic(Clinic $clinic)
    {
        $users = $this->userService->indexByClinic($clinic);

        return UserResource::collection($users);
    }

    public function show(User $user)
    {
        $user = $this->userService->show($user);

        return new UserResource($user);
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user = $this->userService->update($request, $user);

        return new UserResource($user);
    }
}
