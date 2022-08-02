<?php

namespace App\Models;

use App\Models\Model;

class Product extends Model
{
    protected $sku;
    protected $name;
    protected $price;
    protected $typeSwitcher;
    protected $Attrs;


    // Setters
    public function setSku($sku)
    {
        $this->sku = $sku;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function setTypeSwitcher($type)
    {
        $this->typeSwitcher = $type;
    }

    public function setAttrs($data)
    {
        foreach ($this->Attrs as $attr) {
            $attrValue = $data[$attr];
            $attrSetter = 'set' . ucfirst($attr);

            $this->$attrSetter($attrValue);
        }
    }

    // Getters
    public function getSku()
    {
        return $this->sku;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getType()
    {
        return $this->typeSwitcher;
    }
}
