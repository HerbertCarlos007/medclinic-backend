<?php

namespace App\Services;

use App\Http\Requests\MedicalRecord\StoreMedicalRecordRequest;
use App\Models\MedicalRecord;

class MedicalRecordService
{
    public function store(StoreMedicalRecordRequest $request)
    {
        $validated = $request->validated();
        $medicalRecord = MedicalRecord::create($validated);

        return $medicalRecord;
    }
}
