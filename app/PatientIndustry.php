<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PatientIndustry extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'patient_industry_code',
        'patient_industry_description',
        'workstation_id',
        'created_by',
        'updated_by',
        'deleted_by'
    ];
}
