<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sell extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $fillable = ['name', 'sell_price', 'buy_price', 'photo', 'quantity', 'buy_totalPrice', 'profit', 'totalBefore','totalAfter','date','discount', 'given','remaining','months','ration', 'surety','surety_phone','client_id','product_id'];
    protected $dates    = ['deleted_at'];



    public function client()
    {
        return $this->belongsTo(Client::class,'client_id');
    }


    public function bigStore()
    {
        return  $this->belongsTo(BigStore::class,'product_id');
    }


    public function salesProfits()
    {
        return  $this->hasMany(SalesProfits::class,'product_id');
    }


}
