<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'name' => 'required|string',
            'location'=> 'required|string|',
            'phone_number' => 'required|digits:11',
            'email' => 'required|email',
        ];
    }

    public function messages()
    {
        return [
            'phone_number.digits' => 'Phone number is not valid',
        ];
    }
}
