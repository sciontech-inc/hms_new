<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VitalMeasurement extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'patient_id',
        'vital_date',
        'vital_time',
        'blood_pressure',
        'heart_rate',
        'temperature',
        'respiratory_rate',
        'oxygen_saturation',
        'pulse_rate',
        'vital_remarks',
        'workstation_id',
        'created_by',
        'updated_by',
        'deleted_by'

    ];

}
