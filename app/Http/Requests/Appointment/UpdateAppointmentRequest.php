<?php

namespace App\Http\Requests\Appointment;

use App\Enums\AppointmentStatus;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateAppointmentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'clinic_id' => [
                'sometimes',
                'required',
                'exists:clinics,id',
            ],

            'patient_id' => [
                'sometimes',
                'required',
                'exists:patients,id',
            ],

            'doctor_id' => [
                'sometimes',
                'required',
                'exists:doctors,id',
            ],

            'scheduled_at' => [
                'sometimes',
                'required',
                'date',
            ],

            'duration' => [
                'sometimes',
                'nullable',
                'integer',
                'min:10',
                'max:30',
            ],

            'status' => [
                'sometimes',
                'required',
                Rule::in(array_column(AppointmentStatus::cases(), 'value')),
            ],

            'type' => [
                'sometimes',
                'required',
                'string',
            ],

            'notes' => [
                'sometimes',
                'nullable',
                'string',
                'max:1000',
            ],
        ];
    }
}
