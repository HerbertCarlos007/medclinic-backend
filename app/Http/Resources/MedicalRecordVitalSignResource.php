<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MedicalRecordVitalSignResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
          'medical_record_id' => $this->medical_record_id,
          'blood_pressure' => $this->blood_pressure,
          'heart_rate' => $this->heart_rate,
          'temperature' => $this->temperature,
          'weight' => $this->weight,
          'height' => $this->height,
          'oxygen_saturation' => $this->oxygen_saturation,
        ];
    }
}
