<?php

namespace App\Http\Requests\MedicalRecordVitalSign;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreMedicalRecordVitalSignRequest extends FormRequest
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
            'blood_pressure' => ['nullable', 'string'],
            'heart_rate' => ['nullable', 'integer'],
            'temperature' => ['nullable', 'decimal:1'],
            'weight' => ['nullable', 'numeric:'],
            'height' => ['nullable', 'numeric:2'],
            'oxygen_saturation' => ['nullable', 'integer'],
        ];
    }
}
