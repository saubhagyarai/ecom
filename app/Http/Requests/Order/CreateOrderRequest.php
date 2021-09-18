<?php

namespace App\Http\Requests\Order;

use Illuminate\Foundation\Http\FormRequest;

class CreateOrderRequest extends FormRequest
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
                'bill_fullname' => 'required',
                'bill_address' => 'required',
                'bill_address2' => 'nullable',
                'bill_city' => 'required',
                'bill_phone' => 'required',
                'bill_email' => 'required|email',
                'notes' => 'max:1000|nullable',    
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
            'bill_fullname.required' => 'Full name is required.',
            'bill_address.required' => 'Address is required.',
            'bill_city.required' => 'City is required.',
            'bill_email.required' => 'Email is required.',
            'bill_phone.required' => 'Contact number is required.'
        ];
    }
}
