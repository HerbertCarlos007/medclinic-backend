<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MedicalRecordAnamneseResource extends JsonResource
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
            'chief_complaint' => $this->chief_complaint,
            'current_illness_history' => $this->current_illness_history,
            'diagnostic_hypothesis' => $this->diagnostic_hypothesis,
        ];
    }
}
