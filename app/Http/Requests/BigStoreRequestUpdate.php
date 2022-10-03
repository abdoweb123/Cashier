<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BigStoreRequestUpdate extends FormRequest
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
//            'product_name'=>'required',
//            'supplier_id' =>'required',
//            'file_name'   =>'image|mimes:jpg,png,gif,jpeg,jfif|max:2048',
//            'quantity'    =>'required',
//            'price'       =>'required',
            'sell_price'  =>'required',
        ];
    }


    public function messages()
    {
        return [
//            'product_name'=>'This field is required',
//            'supplier_id' =>'This field is required',
//            'quantity'    =>'This field is required',
//            'price'       =>'This field is required',
            'sell_price'  =>'This field is required',
        ];
    }
}
