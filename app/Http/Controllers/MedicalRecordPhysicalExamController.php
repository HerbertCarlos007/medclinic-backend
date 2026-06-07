<?php

namespace App\Http\Controllers;

use App\Http\Requests\MedicalRecordPhysicalExam\StoreMedicalRecordPhysicalExamRequest;
use App\Http\Resources\MedicalRecordPhysicalExamResource;
use App\Services\MedicalRecordPhysicalExamService;

class MedicalRecordPhysicalExamController extends Controller
{
    public function __construct(
        protected MedicalRecordPhysicalExamService $medicalRecordPhysicalExam,
    ) {}

    public function store(StoreMedicalRecordPhysicalExamRequest $request)
    {
        $physicalExam = $this->medicalRecordPhysicalExam->store($request);

        return new MedicalRecordPhysicalExamResource($physicalExam);
    }
}
