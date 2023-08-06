<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Schedulings extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'doctors_id',
        'date',
        'start_time',
        'end_time',
        'details',
        'type',
        'type_description',
        'status',
        'status',
        'workstation_id',
        'created_by',
        'updated_by'
    ];
}
