<?php

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