<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class NoSpecialCharacters implements Rule
{
    public function passes($attribute, $value)
    {
        // Check if the value contains any special characters
        return preg_match('/[!@#$%^&*(),.?":{}|<>]/', $value) === 0;
    }

    public function message()
    {
        return 'The :attribute cannot contain any special characters.';
    }
}
