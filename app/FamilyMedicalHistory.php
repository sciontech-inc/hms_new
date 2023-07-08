<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FamilyMedicalHistory extends Model
{
    use SoftDeletes;

    protected $fillable = [

        'patient_id',
        'fm_relationship',
        'fm_medical_condition',
        'fm_age_at_diagnosis',
        'fm_age_at_death',
        'fm_cause_of_death',
        'fm_other_relevant_medical_history',
        'fm_family_history_of_specific_conditions',
        'fm_ethnicity',
        'fm_lifestyle_factors',
        'fm_other_family_members_affected',
        'fm_remarks',
        'workstation_id',
        'created_by',
        'updated_by',
        'deleted_by'
        
    ];
}
