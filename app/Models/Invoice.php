<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['id','supplier_id','paid_all','paid_date','paid_notes'];
    protected $dates = ['deleted_at'];


    public function supplier(){
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }
}
