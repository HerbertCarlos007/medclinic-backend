<?php

namespace App\Http\Controllers;

use App\Http\Requests\MedicalRecord\StoreMedicalRecordRequest;
use App\Http\Resources\MedicalRecordResource;
use App\Services\MedicalRecordService;

class MedicalRecordController extends Controller
{
    public function __construct(
        protected MedicalRecordService $medicalRecordService
    ) {}

    public function store(StoreMedicalRecordRequest $request)
    {
        $medicalRecord = $this->medicalRecordService->store($request->validated());

        return new MedicalRecordResource($medicalRecord);
    }
}
