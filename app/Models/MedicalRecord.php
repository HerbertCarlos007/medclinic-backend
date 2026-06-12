<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

#[Fillable([
    'appointment_id',
])]

class MedicalRecord extends Model
{
    public function appointment(): BelongsTo
    {
        return $this->belongsTo(Appointment::class);
    }

    public function vitalSign(): HasOne
    {
        return $this->hasOne(MedicalRecordVitalSign::class);
    }

    public function anamnese(): HasOne
    {
        return $this->hasOne(MedicalRecordAnamnese::class);
    }

    public function physicalExam(): HasOne
    {
        return $this->hasOne(MedicalRecordPhysicalExam::class);
    }

    public function prescription(): HasMany
    {
        return $this->hasMany(MedicalRecordPrescription::class);
    }

    public function exam(): HasMany
    {
        return $this->hasMany(MedicalRecordExam::class);
    }
}
