<?php

namespace App\Services;

use App\Http\Requests\MedicalRecordAnamnese\StoreMedicalRecordAnamneseRequest;
use App\Models\MedicalRecordAnamnese;

class MedicalRecordAnamneseService
{
    public function store(array $data)
    {
        return MedicalRecordAnamnese::create($data);
    }
}
