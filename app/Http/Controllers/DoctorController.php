<?php

namespace App\Http\Controllers;

use App\Http\Requests\Doctor\StoreDoctorRequest;
use App\Http\Requests\Doctor\UpdateDoctorRequest;
use App\Http\Resources\DoctorResource;
use App\Models\Clinic;
use App\Models\Doctor;
use App\Services\DoctorService;

class DoctorController extends Controller
{
    public function __construct(
        protected DoctorService $doctorService,
    ) {}

    public function store(StoreDoctorRequest $request)
    {
        $doctor = $this->doctorService->store($request);

        return new DoctorResource($doctor);
    }

    public function indexByClinic(Clinic $clinic)
    {
        $doctors = $this->doctorService->indexByClinic($clinic);

        return DoctorResource::collection($doctors);
    }

    public function show(Doctor $doctor)
    {
        $doctor = $this->doctorService->show($doctor);

        return new DoctorResource($doctor);
    }

    public function update(UpdateDoctorRequest $request, Doctor $doctor)
    {
        $doctor = $this->doctorService->update($request, $doctor);

        return new DoctorResource($doctor);
    }
}
