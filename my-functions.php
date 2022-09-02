<?php

function formatPrice(int $enCentimes):string
{
    return number_format(($enCentimes / 100), 2, ",", ".") . "€";
}

function formatOrderNumber($number):string
{
    return sprintf("%'010d\n", $number);
}

function priceExcludingVAT(int $priceTTC): int
{
    return (100 * $priceTTC) / 120;
}

function discountedPrice(int $price, int $discount): int
{
    return $price - (($price * $discount) / 100);
}

function allProductsPrice(array $post, array $products): int
{
    $totalProductsPrice = 0;
    for ($i = 0; $i < count($products); $i++) {
        if (isset($_SESSION['items'][$i]['quantity']) && $_SESSION['items'][$i]['quantity'] > 0) {
            $totalProductsPrice = $totalProductsPrice + $_SESSION['object'][$i]->price * $_SESSION['items'][$i]['quantity'];
        }
    }
    return $totalProductsPrice;
}

function allProductsExcludingVAT(array $post, array $products): int
{
    return ((allProductsPrice($post, $products) * 20)/100);
}












//
//function allProductsWeight(): int
//{
//    $totalWeight = 0;
//    foreach ($_SESSION as $product) {
//        $totalWeight = $totalWeight + $product['weight'] * $product['quantity'];
//    }
//    return $totalWeight;
//}
//
//function shippingCost(): int
//{
//    if (allProductsWeight() < 500) {
//        return 1;
//    } elseif (allProductsWeight() < 2000) {
//        return 2;
//    } else {
//        return 3;
//    }
//}
//
//function shippingDPD(): int
//{
//    if (shippingCost() === 1) {
//        return 1000;
//    } elseif (shippingCost() === 2) {
//        return 1500;
//    } else {
//        return 0;
//    }
//}
//
//function shippingLaPoste(): int
//{
//    if (shippingCost() === 1) {
//        return 500;
//    } elseif (shippingCost() === 2) {
//        return (allProductsPrice() / 10);
//    } else {
//        return 0;
//    }
//}