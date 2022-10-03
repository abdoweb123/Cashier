<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class clientInvoice extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $fillable = ['id','client_id','paid_all','paid_date','paid_notes'];
    protected $dates = ['deleted_at'];




    public function clients()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

}
