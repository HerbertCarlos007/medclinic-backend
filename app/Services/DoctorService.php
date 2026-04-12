<?php

namespace App\Services;

use App\Http\Requests\Doctor\StoreDoctorRequest;
use App\Http\Requests\Doctor\UpdateDoctorRequest;
use App\Models\Clinic;
use App\Models\Doctor;

class DoctorService
{
    public function store(StoreDoctorRequest $request)
    {
        $validated = $request->validated();
        $doctor = Doctor::create($validated);

        return $doctor;
    }

    public function indexByClinic(Clinic $clinic)
    {
        return $clinic->doctors;
    }

    public function show(Doctor $doctor)
    {
        return $doctor;
    }

    public function update(UpdateDoctorRequest $request, Doctor $doctor)
    {
        $validated = $request->validated();
        $doctor->update($validated);

        return $doctor;
    }
}
