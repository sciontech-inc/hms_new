<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ConsultantDepartment extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'code',
        'description',
        'workstation_id',
        'created_by',
        'updated_by',
        'deleted_by'
    ];
}
