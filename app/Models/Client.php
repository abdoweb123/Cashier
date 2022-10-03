<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $fillable = ['name','phone', 'address','notes'];
    protected $dates    = ['deleted_at'];


    public function sells()
    {
        return $this->hasMany(Sell::class,'client_id');
    }


    public function clientInvoices()
    {
        return $this->hasMany(clientInvoice::class, 'client_id');
    }

}
