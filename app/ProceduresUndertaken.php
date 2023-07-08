<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class ProceduresUndertaken extends Model
{
    use SoftDeletes;

    protected $fillable = [

        'patient_id',
        'procedure_date',
        'procedure_name',
        'procedure_description',
        'procedure_reason',
        'procedure_results',
        'pre_procedure_preparation',
        'post_procedure_preparation',
        'procedure_complications',
        'procedure_sedation_used',
        'procedure_remarks',
        'workstation_id',
        'created_by',
        'updated_by',
        'deleted_by'

    ];
}
