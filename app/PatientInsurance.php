<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PatientInsurance extends Model
{
    use SoftDeletes;

    protected $fillable = [

        'patient_id',
        'provider',
        'type',
        'policy_no',
        'group_policy_no',
        'insurance_notes',
        'workstation_id',
        'created_by',
        'updated_by',
        'deleted_by'
    ];
    
}
