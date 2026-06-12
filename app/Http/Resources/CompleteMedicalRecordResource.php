<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CompleteMedicalRecordResource extends JsonResource
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
            'patient_id' => $this->patient_id,
            'doctor_id' => $this->doctor_id,

            'anamnese' => new MedicalRecordAnamneseResource(
                $this->whenLoaded('anamnese')
            ),

            'vital_signs' => new MedicalRecordVitalSignResource(
                $this->whenLoaded('vitalSign')
            ),

            'physical_exam' => new MedicalRecordPhysicalExamResource(
                $this->whenLoaded('physicalExam')
            ),

            'exams' => MedicalRecordExamResource::collection(
                $this->whenLoaded('exam')
            ),

            'prescriptions' => MedicalRecordPrescriptionResource::collection(
                $this->whenLoaded('prescription')
            ),

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
