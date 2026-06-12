<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompleteMedicalRecord\StoreCompleteMedicalRecordRequest;
use App\Http\Resources\CompleteMedicalRecordResource;
use App\Services\CompleteMedicalRecordService;

class CompleteMedicalRecordController extends Controller
{
    public function __construct(
        protected CompleteMedicalRecordService $completeMedicalRecordService
    ){}

    public function store(StoreCompleteMedicalRecordRequest $request)
    {
       $medicalRecord = $this->completeMedicalRecordService->store($request->validated());

       return new CompleteMedicalRecordResource($medicalRecord);
    }
}
