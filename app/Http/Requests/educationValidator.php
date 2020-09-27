<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class educationValidator extends FormRequest
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
            'inst_name' => 'required',
            'inst_address' => 'required',
            'degree' => 'required',
            'faculty' => 'required',
            'board' => 'required',
            'passed_year' => 'required',
            'division'=> 'required',
        ];
    }
}
