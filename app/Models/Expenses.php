<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Expenses extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['id','expenses_side','paid_money','paid_date','paid_notes'];
    protected $dates = ['deleted_at'];
}
