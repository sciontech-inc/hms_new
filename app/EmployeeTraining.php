<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeeTraining extends Model
{
    use SoftDeletes;

    protected $fillable = [

        'employee_no',
        'training_no',
        'training_name',
        'training_provider',
        'training_description',
        'training_date',
        'training_location',
        'training_duration',
        'training_outcome',
        'training_type',
        'expiration_date',
        'recertification_date',
        'workstation_id',
        'created_by',
        'updated_by',
        'deleted_by'
    ];
}
