<?php

function formatPrice(int $enCentimes):void{
    echo number_format(($enCentimes/100),2, ",") . "€";
}

function priceExcludingVAT(int $priceTTC):int{
    return (100*$priceTTC)/120;
}

function discountedPrice(int $price,int $discount):int{
    return $price - (($price*$discount)/100);
}