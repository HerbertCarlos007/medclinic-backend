<?php

namespace App\Services;

use App\Http\Requests\MedicalRecordVitalSign\StoreMedicalRecordVitalSignRequest;
use App\Models\MedicalRecordVitalSign;

class MedicalRecordVitalSignService
{
    public function store(StoreMedicalRecordVitalSignRequest $request)
    {
        $validated = $request->validated();
        $vitalSign = MedicalRecordVitalSign::create($validated);

        return $vitalSign;
    }
}
