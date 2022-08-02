<?php

namespace App\Models;

class Furniture extends Product
{
    private $height;
    private $width;
    private $length;

    protected $Attrs = ['sku', 'name', 'price', 'typeSwitcher', 'height', 'width', 'length'];


    // Setters
    public function setHeight($height)
    {
        $this->height = $height;
    }

    public function setWidth($width)
    {
        $this->width = $width;
    }

    public function setLength($length)
    {
        $this->length = $length;
    }

    // Getters
    public function getHeight()
    {
        return $this->height;
    }

    public function getWidth()
    {
        return $this->width;
    }

    public function getLength()
    {
        return $this->length;
    }
}
