<?php

namespace TestTask\Validation\Rules;

use TestTask\Validation\Rules\Contracts\Rule;

class ConfirmedRule implements Rule
{
    public function apply($field, $value, $data = [])
    {
        return ($data[$field] === $data[$field . '_confirmation']);
    }

    public function __toString()
    {
        return '%s does not match %s confirmation';
    }
}