<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'name',
    'clinic_id',
])]
class Specialty extends Model
{
    public function clinic(): BelongsTo
    {
        return $this->belongsTo(Clinic::class);
    }
}
