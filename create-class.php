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

class AllProductsInStock extends ItemsInOrder
{
    public string $description;
    public int $stock;
    public int $category_id;
    public string $image_url;

    function __construct($name, $product_id, $price, $weight, $available, $description, $stock, $category_id, $image_url)
    {
        $this->name = $name;
        $this->product_id = $product_id;
        $this->price = $price;
        $this->weight = $weight;
        $this->available = $available;
        $this->description = $description;
        $this->stock = $stock;
        $this->category_id = $category_id;
        $this->image_url = $image_url;
    }
}


class OrderAccepted
{
    public int $order_number;
    public int $customer_id;
    public string $date;
    public int $total_price;
    public int $total_weight;
    function __construct($db){
        $this->order_number = (lastOrderNumber($db)[0]['number'] + 1);
//        $this->customer_id = ;
        $this->date = date("Y-m-d");
//        $this->total_price = ;
//        $this->total_weight = ;
    }
}

class OrderAcceptedProducts
{
    public int $product_id;
    public int $quantity;
    public int $total_product_price;
    public int $total_product_weight;
    public int $order_id;
    function __construct($db, $product_id, $quantity){
        $this->product_id = $product_id;
        $this->quantity = $quantity;
//        $this->total_product_price = ;
//        $this->total_product_weight = ;
        $this->order_id = (lastOrderNumber($db)[0]['number'] + 1);
    }
}