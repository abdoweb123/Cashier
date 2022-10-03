<?php

namespace App\Models;

use http\Env\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Validator;

class Safe extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['id','added','notes'];
    protected $dates = ['deleted_at'];




}
