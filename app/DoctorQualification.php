<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class DoctorQualification extends Model
{
    use SoftDeletes;

    protected $fillable = [

        'doctor_id',
        'degree',
        'description',
        'institute',
        'year',
        'notes',
        'workstation_id',
        'created_by',
        'updated_by',
        'deleted_by'
    ];
    
}
