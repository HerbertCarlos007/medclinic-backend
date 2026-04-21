<?php

namespace App\Http\Controllers;

use App\Http\Requests\Patient\StorePatientRequest;
use App\Http\Requests\Patient\UpdatePatientRequest;
use App\Http\Resources\PatientResource;
use App\Models\Clinic;
use App\Models\Patient;
use App\Services\PatientService;

class PatientController extends Controller
{
    public function __construct(
        protected PatientService $patientService
    ) {}

    public function store(StorePatientRequest $request)
    {
        $patient = $this->patientService->store($request);

        return new PatientResource($patient);
    }

    public function indexByClinic(Clinic $clinic)
    {
        $patients = $this->patientService->indexByClinic($clinic);

        return PatientResource::collection($patients);
    }

    public function show(Patient $patient)
    {
        $patient = $this->patientService->show($patient);

        return new PatientResource($patient);
    }

    public function update(UpdatePatientRequest $request, Patient $patient)
    {
        $patient = $this->patientService->update($request, $patient);

        return new PatientResource($patient);
    }
}
