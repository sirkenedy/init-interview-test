<?php

namespace App\Http\Requests\Order;

use Illuminate\Foundation\Http\FormRequest;

class OrderStoreRequest extends FormRequest
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
            'name' => 'required',
            'weight'=> 'required',
            'transport' => 'required',
            'country' => 'required',
        ];
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Name field is required!',
            'weight.required' => "Enter the weight of the product or goods",
            'transport.required' => "Select mode of transportation",
            'country.required' => "Select country from which goods is to be ordered",
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            // 
        ]);
    }
}
