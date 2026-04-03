<?php

namespace App\Services;

use App\Http\Requests\User\StoreUserRequest;
use App\Models\User;

class UserService
{
    public function store(StoreUserRequest $request)
    {
        $validated = $request->validated();
        $user = User::create($validated);
        $user->token = $user->createToken('token')->plainTextToken;
        return $user;
    }
}
