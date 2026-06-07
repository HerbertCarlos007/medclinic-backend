<?php

namespace App\Http\Requests\MedicalRecordAnamnese;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreMedicalRecordAnamneseRequest extends FormRequest
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
            'medical_record_id' => ['required', 'integer', 'exists:medical_records,id'],
            'chief_complaint' => ['nullable', 'string'],
            'current_illness_history' => ['nullable', 'string'],
            'diagnostic_hypothesis' => ['nullable', 'string'],
        ];
    }
}
