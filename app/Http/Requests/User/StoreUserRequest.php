<?php

namespace App\Http\Requests\User;

use App\Enums\Role;
use App\Enums\UserStatus;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUserRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'min:6', 'max:100'],
            'role' => ['required', Rule::in(array_column(Role::cases(), 'value'))],
            'clinic_id' => ['required', 'exists:clinics,id'],
            'is_active' => ['required', Rule::in(array_column(UserStatus::cases(), 'value'))],
        ];
    }
}
