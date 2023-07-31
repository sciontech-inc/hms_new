<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RoomsBedsDietary extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'patient_admission_id',
        'building_id',
        'floor_id',
        'room_id',
        'bed_id',
        'type',
        'start_datetime',
        'end_datetime',
        'status',
        'workstation_id',
        'created_by',
        'updated_by',
        'deleted_by',
    ];
}
