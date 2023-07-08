<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MedicalCase extends Model
{
    use SoftDeletes;

    protected $fillable = [
        
        'patient_id',
        'date_recorded',
        'chief_complaint',
        'diagnostic_tests',
        'diagnosis',
        'prognosis',
        'physician_notes',
        'nursing_notes',
        'discharge_summary',
        'medical_case_remarks',
        'workstation_id',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

}
