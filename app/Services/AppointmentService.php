<?php

namespace App\Services;

use App\Http\Requests\Appointment\StoreAppointmentRequest;
use App\Http\Requests\Appointment\UpdateAppointmentRequest;
use App\Http\Resources\AppointmentResource;
use App\Models\Appointment;
use App\Models\Clinic;
use App\Models\Doctor;
use Carbon\Carbon;
use Illuminate\Validation\ValidationException;

class AppointmentService
{
    public function store(StoreAppointmentRequest $request)
    {
        $validated = $request->validated();

        $scheduled = Carbon::parse($validated['scheduled_at']);
        $minute = $scheduled->minute < 30 ? 0 : 30;
        $scheduled->setTime($scheduled->hour, $minute, 0);

        $validated['scheduled_at'] = $scheduled;

        $exist = Appointment::where('scheduled_at', $validated['scheduled_at'])
            ->where('doctor_id', $validated['doctor_id'])
            ->where('clinic_id', $validated['clinic_id'])
            ->exists();

        if ($exist) {
            throw ValidationException::withMessages([
                'scheduled_at' => ['Já existe uma consulta nesse horário'],
            ]);
        }

        $appointment = Appointment::create($validated);

        return new AppointmentResource($appointment);
    }

    public function getClinicAppointmentsByDate(Clinic $clinic, $date = null)
    {
        return $clinic->appointments()
            ->whereDate('scheduled_at', '=', $date)
            ->get();
    }

    public function getDoctorWaitingAppointmentsToday(Clinic $clinic)
    {

        $doctorId = auth()->user()->doctor?->id;

        if (! $doctorId) {
            return response()->json([
                'message' => 'Usuário não é um médico',
            ], 403);
        }

        $appointments = $clinic->appointments()
            ->where('doctor_id', '=', $doctorId)
            ->where('status', '=', 'waiting')
            ->whereDate('scheduled_at', '=', Carbon::today()->toDateString())
            ->orderBy('scheduled_at')
            ->get();

        return $appointments;
    }

    public function getDoctorCompletedAppointmentsToday(Clinic $clinic)
    {

        $doctorId = auth()->user()->doctor?->id;

        if (! $doctorId) {
            return response()->json([
                'message' => 'Usuário não é um médico',
            ], 403);
        }

        $appointments = $clinic->appointments()
            ->where('doctor_id', '=', $doctorId)
            ->where('status', '=', 'completed')
            ->whereDate('scheduled_at', '=', Carbon::today()->toDateString())
            ->orderBy('scheduled_at')
            ->get();

        return $appointments;
    }

    public function getDoctorAppointmentsByDate(Doctor $doctor, $date = null)
    {
        return $doctor->appointments()
            ->whereDate('scheduled_at', '=', $date)
            ->get();
    }

    public function findAppointmentById(Appointment $appointment, Clinic $clinic)
    {
        $appointment = Appointment::where('id', $appointment->id)
            ->where('clinic_id', $clinic->id)
            ->firstOrFail();

        return $appointment;
    }

    public function updateAppointmentStatus(UpdateAppointmentRequest $request, Appointment $appointment)
    {
        $appointment->update([
            'status' => $request->validated('status')
        ]);

        return $appointment;
    }
}
