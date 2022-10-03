<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BigStoreResource extends JsonResource
{

    public function toArray($request)
    {
        return [

            "id"=>$this->id,
            "supplier_id"=>$this->supplier_id,
            "supplier_name"=>$this->supplier->name,
            "product_name"=>$this->product_name,
            "file_name"=>asset('images/offers/' . $this->file_name),
            "quantity"=>$this->quantity,
            "price"=>$this->price,
            "sell_price"=>$this->sell_price,
            "total"=>$this->total,

        ];
    }
}
