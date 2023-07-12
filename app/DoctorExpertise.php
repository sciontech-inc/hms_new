<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DoctorExpertise extends Model
{
    use SoftDeletes;

    protected $fillable = [

        'doctor_id',
        'specialization',
        'sub_specialty',
        'clinical_focus',
        'procedures_techniques',
        'certification',
        'years_of_experience',
        'key_professional_achievements',
        'notes',
        'workstation_id',
        'created_by',
        'updated_by',
        'deleted_by'
    ];
}
