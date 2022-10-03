<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SellRemainRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required',
            'sell_price'=>'required',
            'quantity'=>'required',
            'totalBefore'=>'required',
            'date'=>'required',
            'discount'=>'required',
            'given'=>'required',
            'remaining'=>'required',
            'surety'=>'required',
            'surety_phone'=>'required',
            'client_id'=>'required',
        ];
    }


    public function messages()
    {
        return [
            'name.required'=>'This name field is required',
            'sell_price.required'=>'This price field is required',
            'quantity.required'=>'This quantity field is required',
            'totalBefore.required'=>'This total field is required',
            'date.required'=>'This date field is required',
            'discount.required'=>'This discount field is required',
            'given.required'=>'This given field is required',
            'remaining.required'=>'This remaining field is required',
            'surety.required'=>'This surety field is required',
            'surety_phone.required'=>'This surety_phone field is required',
            'client_id.required'=>'This client_id field is required',
        ];
    }


}
