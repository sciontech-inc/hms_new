<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Floor extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'building_id',
        'floor_no',
        'floor_name',
        'capacity',
        'workstation_id',
        'created_by',
        'updated_by'
    ];
}
