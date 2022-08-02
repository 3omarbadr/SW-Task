<?php

namespace App\Models;

class Book extends Product
{
    private $weight;

    protected $Attrs = ['sku', 'name', 'price', 'typeSwitcher', 'weight'];

    public function setWeight($weight)
    {
        $this->weight = $weight;
    }

    public function getWeight()
    {
        return $this->weight;
    }
}
