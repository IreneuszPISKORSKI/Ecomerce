<?php
/**
 * @param $enCentimes
 * @return string
 */
function formatPrice($enCentimes){
    return number_format(($enCentimes/100),2, ",") . "€";
}

function priceExcludingVAT($priceTTC){
    return formatPrice((100*$priceTTC)/120);
}