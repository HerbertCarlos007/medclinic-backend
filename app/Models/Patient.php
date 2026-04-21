<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable([
    'name',
    'email',
    'cpf',
    'birth_date',
    'gender',
    'phone',
    'address',
    'clinic_id',
])]
class Patient extends Model
{
    public function clinic(): BelongsTo
    {
        return $this->belongsTo(Clinic::class);
    }

    public function apointments(): HasMany
    {
        return $this->hasMany(Appointment::class);
    }
}
