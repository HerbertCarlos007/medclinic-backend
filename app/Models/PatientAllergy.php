<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'patient_id',
    'name',
])]
class PatientAllergy extends Model
{
    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }
}
