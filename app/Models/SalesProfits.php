<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SalesProfits extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['product_id','name','profit','buy_totalPrice','totalAfter','sales'];
    protected $dates    = ['deleted_at'];
    protected $primaryKey = 'product_id';

    public function sell()
    {
        return  $this->belongsTo(Sell::class,'product_id');
    }
}
