<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GuarantorHistory extends Model
{
    use SoftDeletes;

    protected $fillable = [
        
        'patient_id',
        'guarantor_id',
        'account_no',
        'workstation_id',
        'created_by',
        'updated_by',
        'deleted_by'

    ];
}
