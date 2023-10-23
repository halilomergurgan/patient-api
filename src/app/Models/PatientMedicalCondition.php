<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PatientMedicalCondition extends Model
{
    use HasFactory;
    protected $table = 'patient_medical_conditions';
    protected $guarded = ['id'];

    /**
     * @return BelongsTo
     */
    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }

    /**
     * @return HasMany
     */
    public function patientMedicalConditionAllergies(): HasMany
    {
        return $this->hasMany(PatientMedicalConditionAllergy::class);
    }

    /**
     * @return HasMany
     */
    public function patientMedicalConditionMedications(): HasMany
    {
        return $this->hasMany(PatientMedicalConditionMedication::class);
    }
}
