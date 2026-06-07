<?php

namespace App\Http\Requests\MedicalRecordPrescription;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreMedicalRecordPrescriptionRequest extends FormRequest
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
            'medication' => ['nullable', 'string'],
            'dosage' => ['nullable', 'string'],
            'frequency' => ['nullable', 'string'],
            'duration' => ['nullable', 'string'],
        ];
    }
}
