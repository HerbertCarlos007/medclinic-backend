<?php

namespace App\Services;

use App\Http\Requests\Patient\StorePatientRequest;
use App\Http\Requests\Patient\UpdatePatientRequest;
use App\Models\Clinic;
use App\Models\Patient;

class PatientService
{
    public function store(StorePatientRequest $request)
    {
        $validated = $request->validated();
        $patient = Patient::create($validated);

        return $patient;
    }

    public function indexByClinic(Clinic $clinic)
    {
        return $clinic->patients;
    }

    public function show(Patient $patient)
    {
        return $patient;
    }

    public function update(UpdatePatientRequest $request, Patient $patient)
    {
        $validated = $request->validated();
        $patient->update($validated);

        return $patient;
    }
}
