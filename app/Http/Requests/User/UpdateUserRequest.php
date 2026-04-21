<?php

namespace App\Http\Requests\User;

use App\Enums\Role;
use App\Enums\UserStatus;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['sometimes', 'string', 'max:255'],
            'email' => [
                'sometimes',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($this->user->id),
            ],
            'password' => ['sometimes', 'nullable', 'min:6', 'max:100'],
            'role' => ['sometimes', Rule::in(array_column(Role::cases(), 'value'))],
            'is_active' => ['sometimes', Rule::in(array_column(UserStatus::cases(), 'value'))],
        ];
    }
}
