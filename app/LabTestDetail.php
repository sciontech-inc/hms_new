<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LabTestDetail extends Model
{
    protected $table = 'lab_test_details';

    protected $fillable = [
        'lab_test_id',
        'category_id',
        'sub_category_id',
        'result',
        'flag',
        'remarks',
        'status',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    public function labTest()
    {
        return $this->belongsTo(LabTest::class, 'lab_test_id');
    }

    public function category()
    {
        return $this->belongsTo(LabTestCategory::class, 'category_id');
    }

    public function subCategory()
    {
        return $this->belongsTo(LabTestSubCategory::class, 'sub_category_id');
    }

  
}
