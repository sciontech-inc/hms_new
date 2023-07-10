<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Doctor extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'doctor_id',
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
        'email',
        'birthplace',
        'marital_status',
        'medical_license_no',
        'medical_license_expiry_date',
        'contact_number_1',
        'contact_number_2',
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
        'workstation_id',
        'created_by',
        'updated_by',
        'deleted_by'
    ];
}
