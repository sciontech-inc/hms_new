<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeeHealth extends Model
{
    use SoftDeletes;

    protected $fillable = [

        'employee_no',
        'record_date',
        'record_description',
        'attending_physician',
        'diagnosis',
        'test_result',
        'record_note',
        'workstation_id',
        'created_by',
        'updated_by',
        'deleted_by'
    ];
}
