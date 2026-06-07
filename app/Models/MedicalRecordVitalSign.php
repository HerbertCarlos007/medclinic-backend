<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'medical_record_id',
    'blood_pressure',
    'heart_rate',
    'temperature',
    'weight',
    'height',
    'oxygen_saturation',
])]
class MedicalRecordVitalSign extends Model
{
    public function medicalRecord(): BelongsTo
    {
        return $this->belongsTo(MedicalRecord::class);
    }
}
