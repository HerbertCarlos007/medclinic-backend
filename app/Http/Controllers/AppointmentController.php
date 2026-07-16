<?php

namespace App\Http\Controllers;

use App\Http\Requests\Appointment\GetAppointmentsRequest;
use App\Http\Requests\Appointment\StoreAppointmentRequest;
use App\Http\Requests\Appointment\UpdateAppointmentRequest;
use App\Http\Resources\AppointmentResource;
use App\Models\Appointment;
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

    public function getDoctorWaitingAppointmentsToday(Clinic $clinic)
    {
        $appointments = $this->appointmentService
            ->getDoctorWaitingAppointmentsToday($clinic);

        return AppointmentResource::collection($appointments);
    }

    public function getDoctorCompletedAppointmentsToday(Clinic $clinic)
    {
        $appointments = $this->appointmentService
            ->getDoctorCompletedAppointmentsToday($clinic);

        return AppointmentResource::collection($appointments);
    }

    public function getClinicAppointmentsByDate(GetAppointmentsRequest $request, Clinic $clinic)
    {
        $date = $request->validated()['date'] ?? null;
        $appointments = $this->appointmentService->getClinicAppointmentsByDate($clinic, $date);

        return AppointmentResource::collection($appointments);
    }

    public function getDoctorAppointmentsByDate(GetAppointmentsRequest $request, Doctor $doctor)
    {
        $date = $request->validated()['date'] ?? null;
        $appointments = $this->appointmentService->getDoctorAppointmentsByDate($doctor, $date);

        return AppointmentResource::collection($appointments);
    }

    public function findAppointmentById(Appointment $appointment, Clinic $clinic)
    {
        $data = $this->appointmentService->findAppointmentById($appointment, $clinic);

        return new AppointmentResource($data);
    }

    public function updateAppointmentStatus(UpdateAppointmentRequest $request, Appointment $appointment)
    {
        $appointment = $this->appointmentService->updateAppointmentStatus($request, $appointment);

        return new AppointmentResource($appointment);
    }
}
