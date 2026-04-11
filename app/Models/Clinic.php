<?php

namespace App\Models;

use App\Enums\ClinicStatus;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable([
    'name',
    'document_number',
    'email',
    'phone',
    'is_active',
])]

class Clinic extends Model
{
    protected function casts(): array
    {
        return [
            'is_active' => ClinicStatus::class,
        ];
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function specialties(): HasMany
    {
        return $this->hasMany(Specialty::class);
    }
}
