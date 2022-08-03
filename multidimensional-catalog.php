<?php
$products = [
    "iPhone" => [
        "name" => "iPhone",
        "price" => 45000,
        "weight" => 200,
        "discount" => 10,
        "picture_url" => "image/iPhone.jpg"
    ],
    "iPad" => [
        "name" => "iPad",
        "price" => 45000,
        "weight" => 400,
        "discount" => null,
        "picture_url" => "image/iPad.png"
    ]];
include "my-functions.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <title>Multidimensional-catalog</title>
</head>
<body>
<div>
    <?php foreach ($products as $modelTel => $product) { ?>
        <h2><?= $modelTel ?></h2>
        <div class="container">
            <div>
                <img src="<?= $product["picture_url"] ?>" alt="Photo of iPhone" height="300">
            </div>
            <div>
                <h3>Name: <?= $product["name"] ?></h3>
                <p>Price: <?php formatPrice($product["price"]) ?></p>
                <p>Price w/o VAT: <?php formatPrice(priceExcludingVAT($product["price"])) ?></p>
                <p>Weight: <?= $product["weight"] ?>g</p>
                <?php if ($product["discount"] !== null) { ?>
                    <p>Discount: <?php echo $product["discount"]; ?> %</p>
                    <p>Price with discount:
                        <?php formatPrice(discountedPrice($product["price"], $product["discount"])); ?>
                    </p>
                <?php } ?>
                <form action="cart.php" method="post">
                    <label for="quantity">Quantity:
                        <input type="number" name="product['quantity']" required min="1">
                    </label>
                    <input type="hidden" name="product['name']" value="<?=$product["name"]?>">
                    <input type="hidden" name="product['price']" value="<?=$product["price"]?>">
                    <input type="hidden" name="product['discount']" value="<?=$product["discount"]?>">
                    <input type="hidden" name="product['weight']" value="<?=$product["weight"]?>">
                    <button type="submit">Order</button>
                </form>
            </div>
        </div>
    <?php } ?>
</body>
</html>