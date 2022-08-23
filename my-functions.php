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

function allProductsPrice():int{
    $totalProductsPrice=0;
    foreach ($_SESSION as $product){
        $totalProductsPrice = $totalProductsPrice + $product['price'] * $product['quantity'] ;
    }
    return $totalProductsPrice;
}

function allProductsExcludingVAT():int{
    return priceExcludingVAT(allProductsPrice());
}

function allProductsWeight():int{
    $totalWeight=0;
    foreach ($_SESSION as $product){
        $totalWeight = $totalWeight + $product['weight'] * $product['quantity'] ;
    }
    return $totalWeight;
}

function shippingCost():int{
    if (allProductsWeight()<500) {
        return 1;
    }elseif(allProductsWeight()<2000){
        return 2;
    }else{
        return 3;
    }
}

function shippingDPD():int{
    if (shippingCost()===1){
        return 1000;
    }elseif(shippingCost()===2){
        return 1500;
    }else{
        return 0;
    }
}

function shippingLaPoste():int{
    if (shippingCost()===1){
        return 500;
    }elseif(shippingCost()===2){
        return (allProductsPrice() / 10);
    }else{
        return 0;
    }
}