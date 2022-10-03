<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClientResource extends JsonResource
{

    public function toArray($request)
    {
        return [

            'id'=>$this->id,
            'name'=>$this->name,
            'address'=>$this->address,
            'phone'=>$this->phone,
            'notes'=>$this->notes,

        ];
    }
}
