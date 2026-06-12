<?php

namespace App\Services;

use App\Models\MedicalRecord;
use App\Traits\ValidatesArrayData;
use Illuminate\Support\Facades\DB;

class CompleteMedicalRecordService
{
    use ValidatesArrayData;

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

            if ($this->hasData($data['anamnese'] ?? [])) {
                $this->anamneseService->store([
                    ...$data['anamnese'],
                    'medical_record_id' => $medicalRecord->id,
                ]);
            }

            if ($this->hasData($data['vital_sign'] ?? [])) {
                $this->vitalSignService->store([
                    ...$data['vital_sign'],
                    'medical_record_id' => $medicalRecord->id,
                ]);
            }

            if ($this->hasData($data['physical_exam'] ?? [])) {
                $this->physicalExamService->store([
                    ...$data['physical_exam'],
                    'medical_record_id' => $medicalRecord->id,
                ]);
            }

            foreach ($data['exam'] ?? [] as $exam) {
               if ($this->hasData($exam)) {
                   $this->examService->store([
                       ...$exam,
                       'medical_record_id' => $medicalRecord->id,
                   ]);
               }
            }

            foreach ($data['prescription'] ?? [] as $prescription) {
                if ($this->hasData($prescription)) {
                    $this->prescriptionService->store([
                        ...$prescription,
                        'medical_record_id' => $medicalRecord->id,
                    ]);
                }
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
