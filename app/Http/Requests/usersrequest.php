<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class usersrequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'body' => 'required|max:255',
            'password' => 'required|min:8'
        ];
    }

     /**
     * Get the error message that apply to the request.
     *
     * @return array
     */
    public function messages(){
        return [
            'body.required' => 'Please enter body',
            'password.required' => 'Please enter password',
            'password.min' => 'Must higher than 8 characters in length'
        ];
    }
    
}
