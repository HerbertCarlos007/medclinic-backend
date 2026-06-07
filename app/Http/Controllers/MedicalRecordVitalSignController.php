<?php

namespace App\Http\Controllers;

use App\Http\Requests\MedicalRecordVitalSign\StoreMedicalRecordVitalSignRequest;
use App\Http\Resources\MedicalRecordVitalSignResource;
use App\Services\MedicalRecordVitalSignService;

class MedicalRecordVitalSignController extends Controller
{
    public function __construct(
        protected MedicalRecordVitalSignService $medicalRecordVitalSignService
    ) {}

    public function store(StoreMedicalRecordVitalSignRequest $request)
    {
        $vitalSign = $this->medicalRecordVitalSignService->store($request);

        return new MedicalRecordVitalSignResource($vitalSign);
    }
}
