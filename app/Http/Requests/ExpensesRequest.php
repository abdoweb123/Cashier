<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExpensesRequest extends FormRequest
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
            'expenses_side'=>'required',
            'paid_money'   =>'required',
            'paid_date'    =>'required',
            'paid_notes'   =>'required',
        ];
    }

    public function messages()
    {
        return [
            'expenses_side.required'=>'This field is required',
            'paid_money.required'   =>'This field is required',
            'paid_date.required'    =>'This field is required',
            'paid_notes.required'   =>'This field is required',
        ];
    }

}
