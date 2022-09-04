<?php

class OrderAcceptedProducts
{
    public int $product_id;
    public int $quantity;
    public int $total_product_price;
    public int $total_product_weight;
    public int $order_id;
    function __construct($thisOrderId, $product_id, $quantity, $counting){
        $this->product_id = $product_id;
        $this->quantity = $quantity;
//        $this->total_product_price = $quantity * $_SESSION['object'][$counting]->price;
//        $this->total_product_weight = $quantity * $_SESSION['object'][$counting]->weight;
        $this->order_id = $thisOrderId;
    }
}