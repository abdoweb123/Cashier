<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SellResource extends JsonResource
{

    public function toArray($request)
    {
        return [

                "id"=>$this->id,
                "client_id"=> $this->client_id,
                "product_id"=> $this->product_id,
                "name"=> $this->name,
                "photo"=>$this->photo,
                "buy_price"=> $this->buy_price,
                "sell_price"=> $this->sell_price,
                "quantity"=>$this->quantity,
                "buy_totalPrice"=>$this->buy_totalPrice,
                "profit"=>$this->profit,
                "totalBefore"=>$this->totalBefore,
                "discount"=>$this->discount,
                "totalAfter"=>$this->totalAfter,
                "given"=>$this->given,
                "remaining"=>$this->remaining,
                "months"=>$this->months,
                "ration"=>$this->ration,
                "surety"=>$this->surety,
                "surety_phone"=>$this->surety_phone,
                "date"=>$this->date,

        ];
    }
}
