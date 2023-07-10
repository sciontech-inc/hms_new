<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bed extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'bed_no',
        'price',
        'building_id',
        'floor_id',
        'room_id',
        'department_id',
        'bed_type',
        'status',
        'patient_id',
        'bed_features',
        'bed_size',
        'bed_condition',
        'bed_notes',
        'bed_availability',
        'workstation_id',
        'created_by',
        'updated_by',
        'deleted_by',
    ];
}
