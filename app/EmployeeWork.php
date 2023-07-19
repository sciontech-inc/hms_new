<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeeWork extends Model
{
    use SoftDeletes;

    protected $fillable = [

        'employee_no',
        'company',
        'position',
        'date_hired',
        'date_of_resignation',
        'remarks',
        'workstation_id',
        'created_by',
        'updated_by',
        'deleted_by'
    ];
}
