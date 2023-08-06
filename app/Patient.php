<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Patient extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'patient_id',
        'profile_img',
        'qr_code',
        'status',
        'firstname',
        'middlename',
        'lastname',
        'suffix',
        'mr_locator_no',
        'nickname',
        'alias',
        'weight',
        'birthdate',
        'sex',
        'citizenship',
        'email',
        'birthplace',
        'marital_status',
        'body_marks',
        'nationality',
        'religion',
        'blood_type',
        'dialect',
        'temp',
        'bp',
        'ethnicity',
        'is_child',
        'non_local',
        'is_hospital_employee',
        'is_blacklisted',
        'is_personal_data_released',
        'is_no_communication_from_company',
        'passport_no',
        'xray_file_no',
        'is_confidential_patient',
        'is_fictitious_birth_date',
        'birth_time',
        'localization',
        'industry',
        'work_level',
        'company',
        'tin_no',
        'occupation',
        'remarks',
        'referred_by',
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
    
    public function medical_case() {
        return $this->hasMany(MedicalCase::class, 'patient_id', 'id');
    }
    
    public function medicine_taken() {
        return $this->hasMany(MedicineTaken::class, 'patient_id', 'id');
    }
    
    public function allergies() {
        return $this->hasMany(PatientAllergies::class, 'patient_id', 'id');
    }
}
