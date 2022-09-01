<?php

require_once 'database.php';
include "my-functions.php";
include "query.php";
include "create-class.php";

session_start();
session_destroy();

$db = connection();

if (isset($db)) {
    $products = takeAllProducts($db);

    foreach ($products as $key => $product) {
        $itemsInStock[$key] = new AllProductsInStock(
            $product["name"],
            $product["product_id"],
            $product["price"],
            $product["weight"],
            $product["available"],
            $product["description"],
            $product["stock"],
            $product["category_id"],
            $product["image_url"]
        );
    }

} else {
    echo 'Something went wrong, the database is not available';
    exit();
}

//echo "<pre>All items in stock:";
//var_dump($itemsInStock);
//echo "</pre>";

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
    <div class="containerAll">
        <?php foreach ($products as $key => $product) { ?>
            <div>
                <div class="containerItem">
                    <div>
                        <img src="<?= $product["image_url"] ?>" alt="Photo of iPhone" height="100">
                    </div>
                    <div>
                        <h3>Name: <?= $product["name"] ?></h3>
                        <p>Description: <?= $product["description"] ?></p>
                        <p>Price: <?php formatPrice($product["price"]) ?></p>
                        <p>Weight: <?= $product["weight"] ?>g</p>
                        <label for="quantity">Quantity:
                            <input type="number" name="<?= $key ?>[quantity]" value="0" min="0">
                        </label>
                        <input type="hidden" name="<?= $key ?>[product_id]" value="<?= $product['product_id'] ?>">
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <div class="validationButtonContainer">
        <!--        <input type="hidden" name="order" value="1">-->
        <button type="submit" id="validationButton">Order</button>
    </div>
    <div class="validationButtonContainer">
        <a href="clear-session.php">Clear cart</a>
    </div>
</form>
</body>
</html>