<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DoctorResource extends JsonResource
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
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'crm' => $this->crm,
            'specialty' => [
                'specialty_id' => $this->specialty_id,
                'specialty_name' => $this->specialty?->name,
            ],
            'clinic' => [
                'clinic_id' => $this->clinic_id,
                'clinic_name' => $this->clinic?->name,
            ],

        ];
    }
}
