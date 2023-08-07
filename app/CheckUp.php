<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CheckUp extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'patient_id',
        'datetime',
        'doctor_id',
        'reason',
        'check_up_status',
        'attachment',
        'workstation_id',
        'check_up_status',
        'created_by',
        'updated_by',
        'deleted_by',
    ];
    
    public function patient() {
        return $this->belongsTo(Patient::class, 'patient_id', 'id');
    }
}
