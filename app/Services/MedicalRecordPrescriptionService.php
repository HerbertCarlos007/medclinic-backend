<?php

namespace App\Services;

use App\Http\Requests\MedicalRecordPrescription\StoreMedicalRecordPrescriptionRequest;
use App\Models\MedicalRecordPrescription;

class MedicalRecordPrescriptionService
{
    public function store(array $data)
    {
        return MedicalRecordPrescription::create($data);
    }
}
