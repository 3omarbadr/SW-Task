<?php
namespace TestTask\Validation\Rules;

use TestTask\Validation\Rules\Contracts\Rule;

class MinRule implements Rule
{

    public function __construct(protected int $min){}

    public function apply($field, $value, $data)
    {
        return (strlen($value) >= $this->min);
    }

    public function __toString()
    {
        return "%s must be greater than $this->min";
    }
}