<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class personalValidator extends FormRequest
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
            'about' =>'required |min:10 |max:100',
            'address1' => 'required',
            'address2' => 'required',
            'phone1' => 'required',
            'phone2' => 'required',
            'dob' => 'required', 
            'ctzn_f' => 'required',
            'ctzn_b' => 'required'
        ];
    }
}
