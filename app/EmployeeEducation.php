<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeeEducation extends Model
{
    use SoftDeletes;

    protected $fillable = [

        'employee_no',
        'educational_attainment',
        'course',
        'school_year',
        'school',
        'workstation_id',
        'created_by',
        'updated_by',
        'deleted_by'
    ];
}
