<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\MedicalRecordAnamnese\StoreMedicalRecordAnamneseRequest;
use App\Http\Resources\MedicalRecordAnamneseResource;
use App\Services\MedicalRecordAnamneseService;
use Illuminate\Http\Request;

class MedicalRecordAnamneseController extends Controller
{
    public function __construct(
        protected MedicalRecordAnamneseService $medicalRecordAnamneseService
    ){}

    public function store(StoreMedicalRecordAnamneseRequest $request)
    {
        $anamnese = $this->medicalRecordAnamneseService->store($request);
        return new MedicalRecordAnamneseResource($anamnese);
    }
}
