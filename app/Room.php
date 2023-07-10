<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'room_no',
        'room_type',
        'room_name',
        'floor_id',
        'building_id',
        'capacity',
        'occupancy_status',
        'availability_schedule',
        'room_features',
        'room_size',
        'room_condition',
        'room_usage_restriction',
        'room_service',
        'room_notes',
        'room_accessibility',
        'workstation_id',
        'created_by',
        'updated_by',
        'deleted_by',
    ];
}
