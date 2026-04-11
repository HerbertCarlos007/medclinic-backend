<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'name',
    'email',
    'phone',
    'crm',
    'clinic_id',
    'specialty_id',
])]
class Doctor extends Model
{
    public function clinic(): BelongsTo
    {
        return $this->belongsTo(Clinic::class);
    }
}
