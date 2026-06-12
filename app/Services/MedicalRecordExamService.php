<?php

namespace App\Services;

use App\Http\Requests\MedicalRecordExam\StoreMedicalRecordExamRequest;
use App\Models\MedicalRecordExam;

class MedicalRecordExamService
{
    public function store(array $data)
    {
        return MedicalRecordExam::create($data);
    }
}
