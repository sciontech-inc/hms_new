<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Supplier extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'supplier_code',
        'supplier_name',
        'contact_person',
        'address',
        'contact_number_1',
        'contact_number_2',
        'email',
        'terms_agreement',
        'pricing_agreement',
        'delivery_terms',
        'remarks',
        'workstation_id',
        'created_by',
        'updated_by',
        'deleted_by'
    ];
}
