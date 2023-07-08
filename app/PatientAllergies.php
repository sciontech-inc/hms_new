<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PatientAllergies extends Model
{
    use SoftDeletes;
    
    protected $fillable = [

        'patient_id',
        'allergy_allergen',
        'allergy_reaction',
        'allergy_severity',
        'allergy_date_of_onset',
        'allergy_treatment',
        'allergy_duration',
        'source_of_information',
        'known_cross_reactives',
        'current_management_plan',
        'medications_to_avoid',
        'severity_of_reaction',
        'allergy_anaphylaxis',
        'allergy_testing',
        'other_relevant_medical_history',
        'workstation_id',
        'created_by',
        'updated_by',
        'deleted_by'
        
    ];
}
