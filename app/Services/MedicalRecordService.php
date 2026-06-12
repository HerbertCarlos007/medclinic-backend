<?php

namespace App\Services;

use App\Http\Requests\MedicalRecord\StoreMedicalRecordRequest;
use App\Models\MedicalRecord;

class MedicalRecordService
{
    public function store(array $data)
    {
       return MedicalRecord::create($data);
    }
}
