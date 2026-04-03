<?php

namespace App\Services;

use App\Http\Requests\Clinic\StoreClinicRequest;
use App\Http\Requests\Clinic\UpdateClinicRequest;
use App\Models\Clinic;

class ClinicService
{
    public function store(StoreClinicRequest $request)
    {
        $validated = $request->validated();
        $clinic = Clinic::create($validated);
        return $clinic;
    }

    public function index()
    {
        $clinics = Clinic::all();
        return $clinics;
    }

    public function update(Clinic $clinic, UpdateClinicRequest $request)
    {
        $validated = $request->validated();
        $clinic->update($validated);
        return $clinic;
    }
}
