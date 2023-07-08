<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SocialHistory extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'patient_id',
        'sh_record',
        'sh_category',
        'sh_details',
        'workstation_id',
        'created_by',
        'updated_by',
        'deleted_by'

    ];
}
