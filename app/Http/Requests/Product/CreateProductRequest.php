<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
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
            'name' => 'required|unique:products|max:255',
            'price' => 'required|integer',
            'sale_price' => 'integer|nullable',
            'featured_image' => 'required|image|max:5024',
            'product_images' => 'nullable',
            'product_images.*' => 'image|max:5024',

        ];
    }
}
