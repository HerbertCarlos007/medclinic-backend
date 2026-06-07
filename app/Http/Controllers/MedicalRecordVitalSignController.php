<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\MedicalRecordVitalSign\StoreMedicalRecordVitalSignRequest;
use App\Http\Resources\MedicalRecordVitalSignResource;
use App\Models\MedicalRecordVitalSign;
use App\Services\MedicalRecordVitalSignService;
use Illuminate\Http\Request;

class MedicalRecordVitalSignController extends Controller
{
    public function __construct(
        protected MedicalRecordVitalSignService $medicalRecordVitalSignService
    ){}

    public function store(StoreMedicalRecordVitalSignRequest $request)
    {
        $vitalSign = $this->medicalRecordVitalSignService->store($request);
        return new MedicalRecordVitalSignResource($vitalSign);
    }
}
