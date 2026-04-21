<?php

namespace App\Http\Requests\Appointment;

use App\Enums\AppointmentStatus;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreAppointmentRequest extends FormRequest
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
            'clinic_id' => ['required', 'exists:clinics,id'],

            'patient_id' => [
                'required',
                'exists:patients,id',
            ],

            'doctor_id' => [
                'required',
                'exists:doctors,id',
            ],

            'scheduled_at' => [
                'required',
                'date',
            ],

            'duration' => [
                'nullable',
                'integer',
                'min:10',
                'max:30',
            ],

            'status' => [
                'required',
                Rule::in(array_column(AppointmentStatus::cases(), 'value')),
            ],

            'notes' => [
                'nullable',
                'string',
                'max:1000',
            ],
        ];
    }
}
