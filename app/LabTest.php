<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LabTest extends Model
{
    use SoftDeletes;

    protected $table = 'lab_tests';

    protected $fillable = [
        'patient_id',
        'transaction_number',
        'request_number',
        'physician_name',
        'datetime_collected',
        'datetime_released',
        'clinical_notes',
        'perform_by',
        'validated_by',
        'noted_by',
        'result_status',
    ];
    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function performedBy()
    {
        return $this->belongsTo(User::class, 'perform_by');
    }

    public function validatedBy()
    {
        return $this->belongsTo(User::class, 'validated_by');
    }

    public function notedBy()
    {
        return $this->belongsTo(User::class, 'noted_by');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
