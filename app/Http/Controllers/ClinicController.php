<?php

namespace App\Http\Controllers;

use App\Http\Requests\Clinic\StoreClinicRequest;
use App\Http\Requests\Clinic\UpdateClinicRequest;
use App\Http\Resources\ClinicResource;
use App\Models\Clinic;
use App\Services\ClinicService;

class ClinicController extends Controller
{
    public function __construct(
        protected ClinicService $clinicService
    )
    {
    }

    public function store(StoreClinicRequest $request)
    {
        $clinic = $this->clinicService->store($request);
        return new ClinicResource($clinic);
    }

    public function index()
    {
        $clinics = $this->clinicService->index();
        return ClinicResource::collection($clinics);
    }

    public function update(Clinic $clinic, UpdateClinicRequest $request)
    {
        $clinic = $this->clinicService->update($clinic, $request);
        return new ClinicResource($clinic);
    }
}
