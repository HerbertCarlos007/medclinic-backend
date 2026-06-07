<?php

namespace App\Services;

use App\Http\Requests\MedicalRecordExam\StoreMedicalRecordExamRequest;
use App\Models\MedicalRecordExam;

class MedicalRecordExamService
{
    public function store(StoreMedicalRecordExamRequest $request)
    {
        $validated = $request->validated();
        $exam = MedicalRecordExam::create($validated);

        return $exam;
    }
}
