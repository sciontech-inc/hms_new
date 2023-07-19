<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'employee_no',
        'profile_img',
        'qr_code',
        'status',
        'firstname',
        'middlename',
        'lastname',
        'suffix',
        'birthdate',
        'sex',
        'citizenship',
        'contact_number_1',
        'contact_number_2',
        'email',
        'street_no',
        'barangay',
        'city',
        'province',
        'country',
        'zip_code',
        'street_no_2',
        'barangay_2',
        'city_2',
        'province_2',
        'country_2',
        'zip_code_2',
        'marital_status',
        'spouse_name',
        'job_title',
        'supervisor',
        'work_location',
        'work_email',
        'work_telephone',
        'work_mobile',
        'start_date',
        'emergency_contact_name',
        'emergency_contact_no',
        'bank_account',
        'tin',
        'sss',
        'pagibig',
        'philhealth',
        'notes',
        'workstation_id',
        'created_by',
        'updated_by',
        'deleted_by'
    ];
}
