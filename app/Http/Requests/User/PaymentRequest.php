<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
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
            'name'=>'required',
            'address'=>'required',
            'phone'=>'required',
            'email'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' =>'Please enter your name',
            'address.required' =>'Please enter your address',
            'phone.required' =>'Please enter your phone',
            'email.required' =>'Please enter your email',
        ];
    }
}
