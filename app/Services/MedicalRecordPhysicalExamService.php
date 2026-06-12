<?php

namespace App\Services;

use App\Http\Requests\MedicalRecordPhysicalExam\StoreMedicalRecordPhysicalExamRequest;
use App\Models\MedicalRecordPhysicalExam;

class MedicalRecordPhysicalExamService
{
    public function store(array $data)
    {
       return MedicalRecordPhysicalExam::create($data);
    }
}
