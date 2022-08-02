<?php

namespace App\Models;

class DVD extends Product
{
    private $size;

    protected $Attrs = ['sku', 'name', 'price', 'typeSwitcher', 'size'];

    // Setters
    public function setSize($size)
    {
        $this->size = $size;
    }

    // Getters
    public function getSize()
    {
        return $this->size;
    }
}
