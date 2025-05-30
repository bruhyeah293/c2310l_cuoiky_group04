<?php

namespace App\Http\Requests\Product;

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
            'category_id' => 'required',
            'name'=>'required|unique:products,name,'.$this->id,
            'price'=>'required|numeric',
            'intro'=>'required',
            'image'=>'image'
        ];
    }
    public function messages()
    {
        return [
            'category_id.required' => 'Please choose a category',
            'name.required' =>'Please enter a product name',
            'name.unique' =>'Product name already available',
            'price.required' =>'Please enter a price', 
            'price.numeric'=>'Price is number',
            'intro.required' =>'Please enter a product intro', 
            'content.required' =>'Please enter a product content', 
            'image.required' =>'Please enter a product image',
            'image.image'=>'The file image is not in the correct format'
        ];
    }
}
