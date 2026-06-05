<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'clinic_id',
    'appointment_id',
    'patient_id',
    'doctor_id',
])]
class MedicalRecordVitalSign extends Model
{
    //
}
