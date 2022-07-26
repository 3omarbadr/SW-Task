<?php

namespace TestTask\Validation\Rules;

use TestTask\Validation\Rules\Contracts\Rule;

class RequiredRule implements Rule
{
    public function apply($field, $value, $data)
    {
        return !empty($value);
    }

    public function __toString()
    {
        return "%s is required and cannot be empty";
    }
}
