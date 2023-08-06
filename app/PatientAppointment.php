<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PatientAppointment extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'patient_id',
        'date',
        'time',
        'doctor_id',
        'reason',
        'appointment_status',
        'workstation_id',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    
    public function patient() {
        return $this->belongsTo(Patient::class, 'patient_id', 'id');
    }

    public function doctor() {
        return $this->belongsTo(Doctor::class, 'doctor_id', 'id');
    }
}
