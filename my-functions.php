<?php

function formatPrice($enCentimes){
    return number_format(($enCentimes/100),2, ",") . "€";
}

function priceExcludingVAT($priceTTC){
    return formatPrice((100*$priceTTC)/120);
}

function discountedPrice($price,$discount){
    return formatPrice($price - (($price*$discount)/100));
}