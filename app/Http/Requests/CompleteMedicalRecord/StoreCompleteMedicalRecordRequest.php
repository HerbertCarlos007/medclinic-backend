<?php

namespace App\Http\Requests\CompleteMedicalRecord;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreCompleteMedicalRecordRequest extends FormRequest
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
            'medical_record' => ['required', 'array'],
            'anamnese' => ['nullable', 'array'],
            'vital_sign' => ['nullable', 'array'],
            'physical_exam' => ['nullable', 'array'],
            'exam' => ['nullable', 'array'],
            'prescription' => ['nullable', 'array'],
        ];
    }
}
