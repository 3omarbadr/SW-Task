<?php

namespace TestTask\Validation\Rules;

use TestTask\Validation\Rules\Contracts\Rule;


class BetweenRule implements Rule
{
    public function __construct(protected $min, protected $max){}

    public function apply($field, $value, $data = [])
    {
        if (strlen($value) < $this->min) {
            return false;
        }

        if (strlen($value) > $this->max) {
            return false;
        }

        return true;
    }

    public function __toString()
    {
        return "%s must be between {$this->min} and {$this->max} characters";
    }
}