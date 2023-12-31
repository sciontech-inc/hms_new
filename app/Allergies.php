<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Allergies extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'allergy_code',
        'allergy_description',
        'workstation_id',
        'created_by',
        'updated_by',
        'deleted_by'
    ];
}
