<?php

namespace App\Services;

use App\Http\Requests\MedicalRecordVitalSign\StoreMedicalRecordVitalSign;
use App\Models\MedicalRecordVitalSign;

class MedicalRecordVitalSignService
{
    public function store(StoreMedicalRecordVitalSign $request)
    {
        $validated = $request->validated();
        $vitalSign = MedicalRecordVitalSign::create($validated);

        return $vitalSign;
    }
}
