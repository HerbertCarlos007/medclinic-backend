<?php

namespace App\Services;

use App\Http\Requests\MedicalRecordPrescription\StoreMedicalRecordPrescriptionRequest;
use App\Models\MedicalRecordPrescription;

class MedicalRecordPrescriptionService
{
    public function store(StoreMedicalRecordPrescriptionRequest $request)
    {
        $validated = $request->validated();
        $prescription = MedicalRecordPrescription::create($validated);

        return $prescription;
    }
}
