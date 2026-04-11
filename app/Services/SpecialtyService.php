<?php

namespace App\Services;

use App\Http\Requests\Specialty\StoreSpecialtyRequest;
use App\Http\Requests\Specialty\UpdateSpecialtyRequest;
use App\Http\Resources\SpecialtyResource;
use App\Models\Clinic;
use App\Models\Specialty;

class SpecialtyService
{
    public function store(StoreSpecialtyRequest $request)
    {
        $validated = $request->validated();
        $specialty = Specialty::create($validated);

        return new SpecialtyResource($specialty);
    }

    public function indexByClinic(Clinic $clinic)
    {
        return $clinic->specialties;
    }

    public function show(Specialty $specialty)
    {
        return $specialty;
    }

    public function update(UpdateSpecialtyRequest $request, Specialty $specialty)
    {
        $validated = $request->validated();
        $specialty->update($validated);

        return new SpecialtyResource($specialty);
    }
}
