<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LabTestSubCategory extends Model
{
    use SoftDeletes;

    protected $table = 'lab_test_sub_categories';

    protected $fillable = [
        'sub_code',
        'test_name',
        'category_id',
        'unit_of_measure',
    ];

    protected $dates = [
        'deleted_at',
    ];

    /**
     * Parent Category
     */
    public function category()
    {
        return $this->belongsTo(LabTestCategory::class, 'category_id');
    }

    
}
