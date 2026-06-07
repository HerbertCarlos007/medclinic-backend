<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'medical_record_id',
    'description',
    'conduct',
    'observations',
])]
class MedicalRecordPhysicalExam extends Model
{
    public function medicalRecord(): BelongsTo
    {
        return $this->BelongsTo(MedicalRecord::class);
    }
}
