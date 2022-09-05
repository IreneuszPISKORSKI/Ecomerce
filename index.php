<?php

require_once 'database.php';
include "my-functions.php";
include "query.php";
include "class/itemInStock.php";
include "class/catalogueOfAllItems.php";

session_start();

if (isset($_SESSION['order'])) {
    clearSessionFromProducts();
}

$db = connection();
$products = takeAllProducts($db);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <title>Index</title>
</head>
<body>
<form action="cart.php" method="post">

        <?php
        $catalog = new Catalog($products);
        $catalog->displayCatalog();
        ?>

    <div class="validationButtonContainer">
        <button type="submit" id="validationButton">Order</button>
    </div>
    <div class="validationButtonContainer">
        <a href="clear-session.php">Clear cart</a>
    </div>
</form>
</body>
</html>