<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\MedicalRecordExam\StoreMedicalRecordExamRequest;
use App\Http\Resources\MedicalRecordExamResource;
use App\Services\MedicalRecordExamService;
use Illuminate\Http\Request;

class MedicalRecordExamController extends Controller
{
    public function __construct(
        protected MedicalRecordExamService $medicalRecordExamService
    ){}

    public function store(StoreMedicalRecordExamRequest $request)
    {
        $exam = $this->medicalRecordExamService->store($request);

        return new MedicalRecordExamResource($exam);
    }
}
