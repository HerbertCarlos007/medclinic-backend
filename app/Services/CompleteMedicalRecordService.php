<?php

namespace App\Services;

use App\Models\MedicalRecord;
use Illuminate\Support\Facades\DB;

class CompleteMedicalRecordService
{
    public function __construct(
        protected MedicalRecordService             $medicalRecordService,
        protected MedicalRecordAnamneseService     $anamneseService,
        protected MedicalRecordVitalSignService    $vitalSignService,
        protected MedicalRecordPhysicalExamService $physicalExamService,
        protected MedicalRecordExamService         $examService,
        protected MedicalRecordPrescriptionService $prescriptionService,
    )
    {
    }

    public function store(array $data): MedicalRecord
    {

        return DB::transaction(function () use ($data) {

            $appointmentId = $data['medical_record']['appointment_id'];

            $medicalRecord = MedicalRecord::where('appointment_id', $appointmentId)->first();

            if ($medicalRecord) {
                throw new \Exception('Já existe um prontuário para esta consulta.');
            }

            $medicalRecord = $this->medicalRecordService->store(
                $data['medical_record']
            );

            if (!empty($data['anamnese'])) {
                $this->anamneseService->store([
                    ...$data['anamnese'],
                    'medical_record_id' => $medicalRecord->id,
                ]);
            }

            if (!empty($data['vital_sign'])) {
                $this->vitalSignService->store([
                    ...$data['vital_sign'],
                    'medical_record_id' => $medicalRecord->id,
                ]);
            }

            if (!empty($data['physical_exam'])) {
                $this->physicalExamService->store([
                    ...$data['physical_exam'],
                    'medical_record_id' => $medicalRecord->id,
                ]);
            }

            foreach ($data['exam'] ?? [] as $exam) {
                $this->examService->store([
                    ...$exam,
                    'medical_record_id' => $medicalRecord->id,
                ]);
            }

            foreach ($data['prescription'] ?? [] as $prescription) {
                $this->prescriptionService->store([
                    ...$prescription,
                    'medical_record_id' => $medicalRecord->id,
                ]);
            }

            return $medicalRecord->load(
                'anamnese',
                'vitalSign',
                'physicalExam',
                'exam',
                'prescription',
            );
        });
    }
}
