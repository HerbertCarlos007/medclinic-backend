<?php

namespace App\Http\Requests\Doctor;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateDoctorRequest extends FormRequest
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
            'email' => ['sometimes', 'string', 'email', 'max:255', Rule::unique('doctors')->ignore($this->doctor->id)],
            'phone' => ['sometimes', 'string', 'max:15', Rule::unique('doctors')->ignore($this->doctor->id)],
            'crm' => ['sometimes', 'string', 'max:20', Rule::unique('doctors')->ignore($this->doctor->id)],
        ];
    }
}
