<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\MedicalRecordPhysicalExam\StoreMedicalRecordPhysicalExamRequest;
use App\Http\Resources\MedicalRecordPhysicalExamResource;
use App\Models\MedicalRecordPhysicalExam;
use App\Services\MedicalRecordPhysicalExamService;
use Illuminate\Http\Request;

class MedicalRecordPhysicalExamController extends Controller
{
    public function __construct(
       protected MedicalRecordPhysicalExamService $medicalRecordPhysicalExam,
    ){}

    public function store(StoreMedicalRecordPhysicalExamRequest $request)
    {
        $physicalExam = $this->medicalRecordPhysicalExam->store($request);

        return new MedicalRecordPhysicalExamResource($physicalExam);
    }
}
