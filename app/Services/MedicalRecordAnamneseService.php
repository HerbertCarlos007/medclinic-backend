<?php

namespace App\Services;

use App\Http\Requests\MedicalRecordAnamnese\StoreMedicalRecordAnamneseRequest;
use App\Models\MedicalRecordAnamnese;

class MedicalRecordAnamneseService
{
    public function store(StoreMedicalRecordAnamneseRequest $request)
    {
        $validated = $request->validated();
        $anamnese = MedicalRecordAnamnese::create($validated);

        return $anamnese;
    }
}
