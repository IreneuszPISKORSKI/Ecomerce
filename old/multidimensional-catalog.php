<?php

require_once 'database.php';
include "my-functions.php";

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
    ],
    "iCat" => [
        "name" => "iCat",
        "price" => 65000,
        "weight" => 1200,
        "discount" => 30,
        "picture_url" => "image/iCat.jpg"
    ],
    "iDog" => [
        "name" => "iDog",
        "price" => 56000,
        "weight" => 2100,
        "discount" => 5,
        "picture_url" => "image/iDog.jpg"
    ]];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../style.css" rel="stylesheet">
    <title>Multidimensional-catalog</title>
</head>
<body>
<form action="../cart.php" method="post">
    <div class="containerAll">
        <?php foreach ($products as $modelTel => $product) { ?>
            <div>
                <h1 style="text-align: center; color: blue"><?= $modelTel ?></h1>
                <div class="containerItem">
                    <div>
                        <img src="<?= $product["picture_url"] ?>" alt="Photo of iPhone" height="100">
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

                        <label for="quantity">Quantity:
                            <input type="number" name="<?= $product["name"] ?>[quantity]" value="0" min="0">
                        </label>
                        <input type="hidden" name="<?= $product["name"] ?>[name]" value="<?= $product["name"] ?>">
                        <input type="hidden" name="<?= $product["name"] ?>[price]" value="<?= $product["price"] ?>">
                        <?php if ($product["discount"] !== null) { ?>
                            <input type="hidden" name="<?= $product["name"] ?>[discount]"
                                   value="<?= $product["discount"] ?>">
                        <?php } else { ?>
                            <input type="hidden" name="<?= $product["name"] ?>[discount]" value="0">
                        <?php } ?>
                        <input type="hidden" name="<?= $product["name"] ?>[weight]" value="<?= $product["weight"] ?>">
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <div class="validationButtonContainer">
        <button type="submit" id="validationButton">Order</button>
    </div>
    <div class="validationButtonContainer">
        <a href="../clear-session.php">Clear cart</a>
    </div>
</form>
</body>
</html>