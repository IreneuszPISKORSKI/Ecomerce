<?php
/**
 * @param $enCentimes
 * @return string
 */
function formatPrice($enCentimes){
    return number_format(($enCentimes/100),2, ",") . "€";
}