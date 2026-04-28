<?php

namespace App\Http\Controllers;

use App\Http\Requests\Appointment\GetAppointmentsRequest;
use App\Http\Requests\Appointment\StoreAppointmentRequest;
use App\Http\Resources\AppointmentResource;
use App\Models\Clinic;
use App\Models\Doctor;
use App\Services\AppointmentService;

class AppointmentController extends Controller
{
    public function __construct(
        protected AppointmentService $appointmentService
    ) {}

    public function store(StoreAppointmentRequest $request)
    {
        $appointment = $this->appointmentService->store($request);

        return new AppointmentResource($appointment);
    }

    public function indexByClinic(Clinic $clinic)
    {
        $appointments = $this->appointmentService->indexByClinic($clinic);

        return AppointmentResource::collection($appointments);
    }

    public function getAppointmentsByDoctor(GetAppointmentsRequest $request, Doctor $doctor)
    {
        $date = $request->validated()['date'] ?? null;
        $appointments = $this->appointmentService->getAppointmentsByDoctor($doctor, $date);

        return AppointmentResource::collection($appointments);
    }
}
