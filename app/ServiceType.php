<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceType extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'service_type',
        'service_description',
        'workstation_id',
        'created_by',
        'updated_by',
        'deleted_by'
    ];
}
