<?php

namespace App\Http\Controllers;

use App\Http\Requests\MedicalRecordPrescription\StoreMedicalRecordPrescriptionRequest;
use App\Http\Resources\MedicalRecordPrescriptionResource;
use App\Services\MedicalRecordPrescriptionService;

class MedicalRecordPrescriptionController extends Controller
{
    public function __construct(
        protected MedicalRecordPrescriptionService $medicalRecordPrescriptionService
    ) {}

    public function store(StoreMedicalRecordPrescriptionRequest $request)
    {
        $prescription = $this->medicalRecordPrescriptionService->store($request);

        return new MedicalRecordPrescriptionResource($prescription);
    }
}
