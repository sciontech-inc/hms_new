<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PatientWorkLevel extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'patient_work_level_code',
        'patient_work_level_description',
        'workstation_id',
        'created_by',
        'updated_by',
        'deleted_by'
    ];
}
