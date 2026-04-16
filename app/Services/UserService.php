<?php

namespace App\Services;

use App\Http\Requests\Login\StoreLoginRequest;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\Clinic;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserService
{
    public function store(StoreUserRequest $request)
    {
        $validated = $request->validated();
        $user = User::create($validated);
        $user->token = $user->createToken('token')->plainTextToken;

        return $user;
    }

    public function login(StoreLoginRequest $request)
    {
        $data = $request->validated();

        if (! Auth::attempt($data)) {
            return null;
        }

        return Auth::user();
    }

    public function indexByClinic(Clinic $clinic)
    {
        return $clinic->users;
    }

    public function show(User $user)
    {
        return $user;
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $validated = $request->validated();
        $user->update($validated);

        return $user;
    }

    public function updateIsActive(UpdateUserRequest $request, User $user)
    {
        $user->update([
            'is_active' => $request->validated('is_active'),
        ]);

        return $user;
    }
}
