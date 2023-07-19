<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeePerformance extends Model
{
    use SoftDeletes;

    protected $fillable = [

        'employee_no',
        'evaluation_date',
        'employee_position',
        'evaluation_officer',
        'rating',
        'approved_by',
        'status',
        'workstation_id',
        'created_by',
        'updated_by',
        'deleted_by'
    ];
}
