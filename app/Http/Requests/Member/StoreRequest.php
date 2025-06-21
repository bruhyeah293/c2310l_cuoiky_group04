<?php

namespace App\Http\Requests\Member;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email' => 'required|email|unique:members',
            'password' => 'required|min:6',
            'password_confirmation'=> 'required_with:password|same:password',
            'level' => 'required|in:1,2'
        ];
    }
    public function messages()
    {
        return [
            'email.email' => 'Please enter correct email',
            'email.required' => 'Please enter email',
            'email.unique' => 'Email already exists',
            'password.required' => 'Please enter password',
            'password.min' =>'Please enter more than 5 characters',
            'password_confirmation.same' =>'Please enter 2 identical password',
            'password_confirmation.required_with' => 'Please enter password confirmation',
        ];
    }

}
