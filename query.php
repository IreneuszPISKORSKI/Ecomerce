<?php

function takeAllProducts():string{
    return 'SELECT * FROM products';
}

function first():string{
    return 'SELECT * FROM products WHERE price >= 3000';
}

function second():string{
    return 'SELECT * FROM products WHERE quantity = 0';
}

function third():string{
    return 'SELECT * FROM products, order_product WHERE products.product_id=order_product.product_id AND order_product.order_id = 1;';
}

//get products by id
//function getProductsByID():string{
//    return 'SELECT * FROM products WHERE product.id -----------------------------------';
//}