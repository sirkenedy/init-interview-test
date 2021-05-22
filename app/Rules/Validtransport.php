<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Validtransport implements Rule
{
    public $value;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if($value == "sea" || $value="air" )
        {
            
            return true;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Inavlid transport mode selected';
    }
}
