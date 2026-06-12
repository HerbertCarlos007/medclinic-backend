<?php

namespace App\Services;

use App\Http\Requests\MedicalRecordVitalSign\StoreMedicalRecordVitalSignRequest;
use App\Models\MedicalRecordVitalSign;

class MedicalRecordVitalSignService
{
    public function store(array $data)
    {
        return MedicalRecordVitalSign::create($data);
    }
}
