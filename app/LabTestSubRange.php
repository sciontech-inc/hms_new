<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LabTestSubRange extends Model
{
    protected $table = 'lab_test_sub_ranges';

    protected $fillable = [
        'sub_category_id',
        'range_code',
        'range_name',
        'low',
        'high',
    ];

    /**
     * Parent Sub Category
     */
    public function subCategory()
    {
        return $this->belongsTo(LabTestSubCategory::class, 'sub_category_id');
    }
}
