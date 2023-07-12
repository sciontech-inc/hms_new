<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'department_code',
        'description',
        'workstation_id',
        'created_by',
        'updated_by',
        'deleted_by'
    ];
}
