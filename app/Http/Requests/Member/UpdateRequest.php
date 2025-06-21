<?php

namespace App\Http\Requests\Member;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'password' => 'nullable|min:6|confirmed',
            'level' => 'required|in:1,2',
        ];
    }
    public function messages()
    {
        return [
            'password.min' =>'Please enter more than 5 characters',
            'password_confirmation.same' =>'Please enter password confirmation',
        ];
    }
}
