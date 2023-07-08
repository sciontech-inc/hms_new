<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Building extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'name',
        'address',
        'city',
        'province',
        'postal_code',
        'contact_number',
        'email',
        'construction_date',
        'architectural_style',
        'total_area',
        'workstation_id',
        'created_by',
        'updated_by',
        'deleted_by'
    ];
}
