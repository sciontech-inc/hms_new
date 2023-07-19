<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeeDependent extends Model
{
    use SoftDeletes;

    protected $fillable = [

        'employee_no',
        'dependent_firstname',
        'dependent_middlename',
        'dependent_lastname',
        'dependent_birthdate',
        'dependent_relationship',
        'dependent_sex',
        'dependent_citizenship',
        'dependent_address',
        'dependent_contact_no',
        'dependent_email',
        'dependent_designation',
        'dependent_notes',
        'workstation_id',
        'created_by',
        'updated_by',
        'deleted_by'
    ];
}
