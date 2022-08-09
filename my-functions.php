<?php

function formatPrice(int $enCentimes):void{
    echo number_format(($enCentimes/100),2, ",", ".") . "€";
}

function priceExcludingVAT(int $priceTTC):int{
    return (100*$priceTTC)/120;
}

function discountedPrice(int $price,int $discount):int{
    return $price - (($price*$discount)/100);
}

function allProductsExcludingVAT(int $price, int $discount, int $quantity):int{
    return priceExcludingVAT(discountedPrice($price, $discount) * $quantity);
}

function shippingWeight(int $quantity, int $weightGram):void{
    echo $quantity*$weightGram/1000 . "Kg";
}