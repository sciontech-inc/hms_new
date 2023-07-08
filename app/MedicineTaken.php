<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class MedicineTaken extends Model
{
    use SoftDeletes;

    protected $fillable = [

        'patient_id',
        'medicine_name',
        'medicine_doses',
        'routes_of_administration',
        'medicine_type',
        'medicine_duration',
        'medicine_reason',
        'medicine_compliance',
        'medicine_remarks',
        'workstation_id',
        'created_by',
        'updated_by',
        'deleted_by'
        
    ];
}
