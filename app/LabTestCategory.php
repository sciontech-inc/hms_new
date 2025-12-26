<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LabTestCategory extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'code',
        'category_name',
        'description',
    ];

    protected $dates = [
        'deleted_at',
    ];
}
