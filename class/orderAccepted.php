<?php

class OrderAccepted
{
    public string $order_number;
    public int $customer_id;
    public string $date;
    public int $total_price;
    public int $total_weight;
    function __construct($db, $totalPriceAll, $totalWeightAll){
        $number = (lastOrderNumber($db)[0]['number'] + 1);
        $this->order_number = formatOrderNumber($number);
        $this->customer_id = 3;
        $this->date = date("Y-m-d");
        $this->total_price = $totalPriceAll;
        $this->total_weight = $totalWeightAll;
    }
}