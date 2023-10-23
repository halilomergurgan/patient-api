<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PatientMedicalConditionAllergy extends Model
{
    use HasFactory;
    protected $table = 'patient_medical_condition_allergies';
    protected $guarded = ['id'];

    /**
     * @return BelongsTo
     */
    public function patientMedicalCondition(): BelongsTo
    {
        return $this->belongsTo(PatientMedicalCondition::class);
    }
}
