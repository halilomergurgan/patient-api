<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Patient extends Model
{
    use HasFactory;
    protected $table = 'patients';
    protected $guarded = ['id'];

    /**
     * @return HasMany
     */
    public function patientNextOfKins(): HasMany
    {
        return $this->hasMany(PatientNextOfKin::class);
    }

    /**
     * @return HasMany
     */
    public function patientMedicalConditions(): HasMany
    {
        return $this->hasMany(PatientMedicalCondition::class);
    }
}
