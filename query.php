<?php

function takeAllProducts($db){
    $query = 'SELECT * FROM products';

    $sql = $db->prepare($query);
    $sql->execute();
    return $sql->fetchAll(PDO::FETCH_ASSOC);
}

//get products by id
function getProductsByID($db){
    $query = "SELECT * FROM products WHERE {$_SESSION['downloadItems']} ";

    $sql = $db->prepare($query);
    $sql->execute();
    return $sql->fetchAll(PDO::FETCH_ASSOC);
}

//SELECT number FROM `orders` ORDER BY number DESC LIMIT 1;
function lastOrderNumber($db){
    $query = "SELECT number FROM `orders` ORDER BY number DESC LIMIT 1";

    $sql = $db->prepare($query);
    $sql->execute();
    return $sql->fetchAll(PDO::FETCH_ASSOC);
}
function lastOrderId($db){
    $query = "SELECT order_id FROM `orders` ORDER BY order_id DESC LIMIT 1";

    $sql = $db->prepare($query);
    $sql->execute();
    return $sql->fetchAll(PDO::FETCH_ASSOC);
}

// 2 funkcje: pierwsza do uploadu zamowienia, a druga do uploadu produktow w zamowieniu
// Reset auto incrementation in tables:
// ALTER TABLE orders AUTO_INCREMENT = 1;
// ALTER TABLE order_product AUTO_INCREMENT = 1;

function sendOrder($db){

    $order_number = $_SESSION['order']->order_number;
    $customer_id = $_SESSION['order']->customer_id;
    $date = $_SESSION['order']->date;
    $total_price = $_SESSION['order']->total_price;
    $total_weight = $_SESSION['order']->total_weight;
echo $date . "</br>";
    $query = "INSERT INTO `orders` (`number`, `customer_id`, `date`, `total_price`, `total_weight`)
            VALUES ('$order_number', $customer_id, '$date', $total_price, $total_weight);";
echo $query . "</br>";
    $sql = $db->prepare($query);
    return $sql->execute();
}

function sendItemsInOrder($db){

    $productsToSend = '';

    foreach ($_SESSION['orderedProduct'] as $key => $product) {
        $product_id = $product->product_id;
        $quantity = $product->quantity;
        $total_product_price = $product->total_product_price;
        $total_product_weight = $product->total_product_weight;
        $order_id = $product->order_id;
        if ($key===0){
            $productsToSend = "( $product_id, $quantity, $total_product_price, $total_product_weight, $order_id )";
        }else {
            $productsToSend = $productsToSend . ", ( $product_id, $quantity, $total_product_price, $total_product_weight, $order_id )";
        }
    }

    $query = "INSERT INTO `order_product` (`product_id`, `quantity`, `total_product_price`, `total_product_weight`, `order_id`) 
VALUES $productsToSend; ";

    $sql = $db->prepare($query);
    return $sql->execute();
}