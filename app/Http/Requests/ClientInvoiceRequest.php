<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientInvoiceRequest extends FormRequest
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
            'paid_all.required'  =>'This field is required',
            'paid_notes.required'=>'This field is required',
            'paid_date.required' =>'This field is required',
        ];
    }

}
