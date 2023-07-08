<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProgressConsultation extends Model
{
    use SoftDeletes;

    protected $fillable = [

        'patient_id',
        'progress_date',
        'progress_title',
        'progress_notes',
        'workstation_id',
        'created_by',
        'updated_by',
        'deleted_by'

    ];
}
