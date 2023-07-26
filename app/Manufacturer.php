<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Manufacturer extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'manufacturer_code',
        'manufacturer_name',
        'contact_person',
        'contact_number_1',
        'contact_number_2',
        'email',
        'payment_terms',
        'tax_information',
        'certification',
        'products',
        'lead_time',
        'delivery_terms',
        'performance_metrics',
        'contracts',
        'remarks',
        'workstation_id',
        'created_by',
        'updated_by',
        'deleted_by'
    ];
}
