<?php

function formatPrice($enCentimes){
    echo number_format(($enCentimes/100),2, ",") . "€";
}

function priceExcludingVAT($priceTTC){
    return (100*$priceTTC)/120;
}

function discountedPrice($price,$discount){
    return $price - (($price*$discount)/100);
}