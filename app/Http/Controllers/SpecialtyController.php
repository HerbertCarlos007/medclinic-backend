<?php

namespace App\Http\Controllers;

use App\Http\Requests\Specialty\StoreSpecialtyRequest;
use App\Http\Requests\Specialty\UpdateSpecialtyRequest;
use App\Http\Resources\SpecialtyResource;
use App\Models\Clinic;
use App\Models\Specialty;
use App\Services\SpecialtyService;

class SpecialtyController extends Controller
{
    public function __construct(
        protected SpecialtyService $specialtyService
    ) {}

    public function store(StoreSpecialtyRequest $request)
    {
        $specialty = $this->specialtyService->store($request);

        return new SpecialtyResource($specialty);
    }

    public function indexByClinic(Clinic $clinic)
    {
        $specialties = $this->specialtyService->indexByClinic($clinic);

        return SpecialtyResource::collection($specialties);
    }

    public function show(Specialty $specialty)
    {
        $specialty = $this->specialtyService->show($specialty);

        return new SpecialtyResource($specialty);
    }

    public function update(UpdateSpecialtyRequest $request, Specialty $specialty)
    {
        $specialty = $this->specialtyService->update($request, $specialty);

        return new SpecialtyResource($specialty);
    }
}
