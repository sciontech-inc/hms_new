<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vitals extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'check_up_id',
        'datetime',
        'heart_rate',
        'blood_pressure',
        'respiratory_rate',
        'temperature',
        'oxygen_saturation',
        'weight',
        'height',
        'workstation_id',
        'created_by',
        'updated_by',
        'deleted_by',
    ];
    
}
