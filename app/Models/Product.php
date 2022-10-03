<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Product extends Model
{
    use softDeletes;
    use HasFactory;

    protected $fillable=['user_id','product_name','file_name','quantity','price'];
    protected $dates =['deleted_at'];


    public function user(){
      return  $this->belongsTo(User::class,'user_id');
    }



}
