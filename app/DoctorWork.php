<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DoctorWork extends Model
{
    use SoftDeletes;

    protected $fillable = [

        'doctor_id',
        'organization_name',
        'position',
        'start_date',
        'end_date',
        'responsibilities',
        'special_achievements',
        'department',
        'leadership_roles',
        'collaboration',
        'notes',
        'workstation_id',
        'created_by',
        'updated_by',
        'deleted_by'
    ];
}
