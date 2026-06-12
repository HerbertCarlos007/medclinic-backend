<?php

namespace App\Http\Controllers;

use App\Http\Requests\MedicalRecordExam\StoreMedicalRecordExamRequest;
use App\Http\Resources\MedicalRecordExamResource;
use App\Services\MedicalRecordExamService;

class MedicalRecordExamController extends Controller
{
    public function __construct(
        protected MedicalRecordExamService $medicalRecordExamService
    ) {}

    public function store(StoreMedicalRecordExamRequest $request)
    {
        $exam = $this->medicalRecordExamService->store($request->validated());

        return new MedicalRecordExamResource($exam);
    }
}
