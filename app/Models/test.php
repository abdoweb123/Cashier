<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class test extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function details()
    {
        return $this->hasMany(testDetails::class,'test_id');
    }


    public function discountResult()
    {
        return $this->discount_type = 'fixed' ? $this->discount_value : $this->discount_value.'%';
    }

}
