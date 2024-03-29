<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class taskValidator extends FormRequest
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
            'title'    => 'required | min:5 | max:50',
            'description'    => 'required |min:10 |max:500',
            'assignedDate'    => 'required',
            'assignedTo'    => 'required',
            'deadline'    => 'required',
            'task_priority'    => 'required',
            'remarks'    => 'required',
        ];
    }
}
