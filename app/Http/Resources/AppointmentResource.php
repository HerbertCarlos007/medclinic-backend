<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AppointmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $birthDate = Carbon::parse($this->patient->birth_date);
        $ageInYears = $birthDate->age;
        $ageInMonths = (int) $birthDate->diffInMonths(now());

        return [
            'id' => $this->id,

            'clinic' => [
                'id' => $this->clinic->id,
                'name' => $this->clinic->name,
            ],

            'doctor' => [
                'id' => $this->doctor->id,
                'name' => $this->doctor->name,
            ],


            'patient' => [
                'id' => $this->patient->id,
                'name' => $this->patient->name,
                'age' => $ageInYears > 0
                    ? "{$ageInYears} anos"
                    : "{$ageInMonths} meses",
                'birth_date' => $this->patient->birth_date->format('d/m/Y'),
                'gender' => $this->patient->gender,
                'phone' => $this->patient->phone,
                'insurance' => $this->patient->insurance,
                'allergies' => $this->patient->allergies->pluck('name'),
                'medications' => $this->patient->medications->map(fn ($medication) => [
                    'name' => $medication->name,
                    'dosage' => $medication->dosage,
                ]),
            ],

            'scheduled_at' => $this->scheduled_at->format('Y-m-d H:i:s'),
            'duration' => $this->duration,

            'status' => [
                'value' => $this->status->value,
                'label' => $this->status->label(),
            ],

            'type' => $this->type,

            'notes' => $this->notes,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
        ];
    }
}
