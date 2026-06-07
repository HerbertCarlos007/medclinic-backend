<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

#[Fillable([
    'medical_record_id',
    'chief_complaint',
    'current_illness_history',
    'diagnostic_hypothesis',
    'diagnostic_hypothesis',
])]
class MedicalRecordAnamneses extends Model
{
    public function medicalRecord(): BelongsTo
    {
        return $this->belongsTo(MedicalRecord::class, );
    }
}
