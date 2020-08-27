<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class userValidator extends FormRequest
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
            'name' => 'required | min:3 | max:50',
            'email' => 'required|unique:all_users| email:rfc,dns',
            'password' => 'required | confirmed | min:4 | max:15',
            'password_confirmation' => 'required',
            'role_id' => 'required',
            'gender' =>'required',
            'department_id' => 'required',
            'position' =>'required',
            'joined_date' => 'required',
            'sub_department' => 'required',            
            'image' => 'required| image |max:2500 ',    
        ];
    }
}
