<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'name' => 'required|max:255',
            'slug' =>'required',
            'price' => 'required|integer',
            'sale_price' => 'integer|nullable',
            'stock' => 'integer|nullable',
            'featured_image' => 'image|max:5024',
            'cats' => 'required|array',
            'cats.*' => 'required|distinct'
        ];
    }


    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'cats.required' => 'Category is required.'
        ];
    }
}
