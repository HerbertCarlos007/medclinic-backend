<?php

namespace App\Services;

use App\Http\Requests\Appointment\StoreAppointmentRequest;
use App\Http\Resources\AppointmentResource;
use App\Models\Appointment;
use App\Models\Clinic;
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

    public function indexByClinic(Clinic $clinic)
    {
        return $clinic->appointments;
    }
}
