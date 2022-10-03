<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvoiceRequest extends FormRequest
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
            'paid_all'  =>'required',
            'paid_notes'=>'required',
            'paid_date' =>'required',
        ];
    }

    public function messages()
    {
        return [
            'paid_all'  =>'This field is required',
            'paid_notes'=>'This field is required',
            'paid_date' =>'This field is required',
        ];
    }

}
