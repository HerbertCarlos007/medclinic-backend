<?php

namespace App\Services;

use App\Http\Requests\MedicalRecordPhysicalExam\StoreMedicalRecordPhysicalExamRequest;
use App\Models\MedicalRecordPhysicalExam;

class MedicalRecordPhysicalExamService
{
    public function store(StoreMedicalRecordPhysicalExamRequest $request)
    {
        $validated = $request->validated();
        $physicalExam = MedicalRecordPhysicalExam::create($validated);

        return $physicalExam;
    }
}
