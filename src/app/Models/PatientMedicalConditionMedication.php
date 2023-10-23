<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PatientMedicalConditionMedication extends Model
{
    use HasFactory;
    protected $table = 'patient_medical_condition_medications';
    protected $guarded = ['id'];

    /**
     * @return BelongsTo
     */
    public function patientMedicalCondition(): BelongsTo
    {
        return $this->belongsTo(PatientMedicalCondition::class);
    }
}
