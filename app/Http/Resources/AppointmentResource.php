<?php

namespace App\Http\Resources;

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
            ],

            'scheduled_at' => $this->scheduled_at,
            'duration' => $this->duration,

            'status' => [
                'value' => $this->status->value,
                'label' => $this->status->label(),
            ],

            'notes' => $this->notes,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
