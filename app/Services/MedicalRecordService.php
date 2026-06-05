<?php

namespace App\Services;

use App\Http\Requests\MedicalRecord\StoreMedicalRecord;
use App\Models\MedicalRecord;

class MedicalRecordService
{
    public function store(StoreMedicalRecord $request)
    {
        $validated = $request->validated();
        $medicalRecord = MedicalRecord::create($validated);

        return $medicalRecord;
    }
}
