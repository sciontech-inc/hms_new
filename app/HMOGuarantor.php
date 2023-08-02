<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HMOGuarantor extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'code',
        'guarantor_name',
        'telephone',
        'fax_no',
        'contact_no',
        'email',
        'address',
        'workstation_id',
        'created_by',
        'updated_by',
        'deleted_by'
    ];
}
