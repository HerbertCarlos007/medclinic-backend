<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MedicalRecordPhysicalExamResource extends JsonResource
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
            'description' => $this->medical_record_id,
            'conduct' => $this->medical_record_id,
            'observations' => $this->medical_record_id,
        ];
    }
}
