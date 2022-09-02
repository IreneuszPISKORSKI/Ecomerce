<?php

function takeAllProducts($db){
    $query = 'SELECT * FROM products';

    $sql = $db->prepare($query);
    $sql->execute();
    return $sql->fetchAll(PDO::FETCH_ASSOC);
}

//get products by id
function getProductsByID($db){
    $query = "SELECT * FROM products WHERE {$_SESSION['downloadItems']} product_id = 999";

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


