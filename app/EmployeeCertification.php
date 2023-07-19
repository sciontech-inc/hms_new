<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeeCertification extends Model
{
    
    use SoftDeletes;

    protected $fillable = [

        'employee_no',
        'certification_no',
        'certification_name',
        'certification_authority',
        'certification_description',
        'certification_date',
        'certification_expiration_date',
        'certification_level',
        'certification_status',
        'certification_achievements',
        'certification_renewal_date',
        'certification_recertification_date',
        'workstation_id',
        'created_by',
        'updated_by',
        'deleted_by'
    ];
}
