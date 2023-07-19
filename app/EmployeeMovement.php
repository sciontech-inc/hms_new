<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class EmployeeMovement extends Model
{
    use SoftDeletes;

    protected $fillable = [

        'employee_no',
        'filed_by',
        'changes',
        'effective_date',
        'remarks',
        'status',
        'approved_by',
        'workstation_id',
        'created_by',
        'updated_by',
        'deleted_by'
    ];
}
