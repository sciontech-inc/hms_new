<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PatientAdmission extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'patient_id',
        'registry_tracking_no',
        'admission_case_no',
        'osca_id_no',
        'admission_regularity',
        'status',
        'admission_datetime',
        'arrival_datetime',
        'mgh_datetime',
        'discharge_datetime',
        'admission_case_group',
        'admission_case_type',
        'transaction_type',
        'patient_category',
        'hospitalization_plan',
        'membership',
        'service_type',
        'sub_service_type',
        'referred_from',
        'price_group',
        'price_scheme',
        'discount_scheme',
        'classification',
        'how_admitted',
        'source_of_admission',
        'type_of_delivery',
        'case_indicator',
        'newborn_baby',
        'newborn_status',
        'disposition',
        'admission_result',
        'type_of_death',
        'death_datetime',
        'expired',
        'autopsy',
        'medical_package',
        'mother_account',
        'remarks',
        'workstation_id',
        'created_by',
        'updated_by',
        'deleted_by',
    ];
    
    public function patient() {
        return $this->belongsTo(Patient::class, 'patient_id', 'patient_id');
    }

    public function rooms() {
        return $this->belongsTo(RoomsBedsDietary::class, 'id', 'patient_admission_id');
    }
}
