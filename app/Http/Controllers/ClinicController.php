<?php

namespace App\Http\Controllers;

use App\Http\Requests\Clinic\StoreClinicRequest;
use App\Http\Resources\ClinicResource;
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
}
