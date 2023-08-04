<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class FamilyInformation extends Model
{
    use SoftDeletes;

    protected $fillable = [

        'patient_id',
        'set_as_emergency_contact',
        'family_fullname',
        'family_birthdate',
        'family_relationship',
        'family_sex',
        'family_citizenship',
        'family_address',
        'family_contact_no',
        'family_email',
        'family_remarks',
        'workstation_id',
        'created_by',
        'updated_by',
        'deleted_by'
        
    ];
}
