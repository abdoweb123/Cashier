<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BigStore extends Model
{
    use HasFactory;
    use softDeletes;

    protected $fillable=['product_name', 'supplier_id', 'category_id','file_name', 'quantity', 'price', 'sell_price', 'total', 'paid_money', 'remain_money',];
    protected $dates =['deleted_at'];


    public function supplier(){
        return  $this->belongsTo(Supplier::class,'supplier_id');
    }


    public function sells(){
        return  $this->hasMany(Sell::class,'product_id');
    }


    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}//end of class
