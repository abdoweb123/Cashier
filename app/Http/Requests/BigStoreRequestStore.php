<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BigStoreRequestStore extends FormRequest
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
            'product_name'=>'required',
            'supplier_id' =>'required',
            'category_id' =>'required',
            'file_name'   =>'required|image|mimes:jpg,png,gif,jpeg,jfif|max:2048',
            'quantity'    =>'required',
            'price'       =>'required',
            'sell_price'  =>'required',
            'total'       =>'required',
            'paid_money'  =>'required',
            'remain_money'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'product_name.required'=>'This product_name is required',
            'supplier_id.required' =>'This supplier_name is required',
            'category_id.required' =>'This category_name is required',
            'file_name.required'   =>'This file_name is required',
            'quantity.required'    =>'This quantity is required',
            'price.required'       =>'This price is required',
            'sell_price.required'  =>'This sell_price is required',
            'total.required'       =>'This total is required',
            'paid_money.required'  =>'This paid_money is required',
            'remain_money.required'=>'This remain_money is required',
        ];
    }


}
