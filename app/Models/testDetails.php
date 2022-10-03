<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class testDetails extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function test()
    {
        return $this->belongsTo(test::class,'test_id');
    }


    public function unitText()
    {
        if ($this->unit == 'piece') {
            $text = 'piece';
        }
        elseif ($this->unit == 'g') {
            $text = 'gram';
        }
        elseif ($this->unit == 'kg') {
            $text = 'kilo gram';
        }
        return $text;

    }


} //end of class
