<?php

namespace App\Services;

use App\Http\Requests\Clinic\StoreClinicRequest;
use App\Models\Clinic;

class ClinicService
{
    public function store(StoreClinicRequest $request)
    {
        $validated = $request->validated();
        $clinic = Clinic::create($validated);
        return $clinic;
    }
}
