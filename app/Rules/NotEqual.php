<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class NotEqual implements Rule
{
    private $otherField;

    public function __construct($otherField)
    {
        $this->otherField = $otherField;
    }

    public function passes($attribute, $value)
    {
        return $value !== request($this->otherField);
    }

    public function message()
    {
        return 'The :attribute must not be equal to the ' . $this->otherField . ' field.';
    }
}