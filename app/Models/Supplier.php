<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Invoice;

class Supplier extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable=['id','name','address','phone','notes'];
    protected $dates =['deleted_at'];


    public function store(){
        return $this->hasMany(Store::class,'supplier_id');
    }


    public function invoice(){
        return $this->hasMany(Invoice::class, 'supplier_id');
    }


    public function bigStore(){
        return $this->hasMany(BigStore::class,'supplier_id');
    }



}
