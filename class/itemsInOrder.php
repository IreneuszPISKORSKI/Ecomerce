<?php

class ItemsInOrder
{
    public string $name;
    public int $product_id;
    public int $price;
    public int $weight;
    public int $available;

    function __construct($name, $product_id, $price, $weight, $available)
    {
        $this->name = $name;
        $this->product_id = $product_id;
        $this->price = $price;
        $this->weight = $weight;
        $this->available = $available;
    }
}