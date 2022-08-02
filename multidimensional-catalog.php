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
    <title>Document</title>
</head>
<body>
<div>
<?php foreach ($products as $modelTel => $product) { ?>
    <div>
        <h2><?= $modelTel ?></h2>
        <h3>Name: <?= $product["name"] ?></h3>
        <p>Price: <?= formatPrice($product["price"]) ?></p>
        <p>Price w/o VAT: <?= formatPrice(priceExcludingVAT($product["price"])) ?></p>
        <p>Weight: <?= $product["weight"] ?>g</p>
        <p><?php if ($product["discount"] != null) {
                echo "Discount: " . $product["discount"] . "%";
            } ?></p>
        <p><?php if ($product["discount"] != null) {?> Price with discount: <?php formatPrice(discountedPrice($product["price"],$product["discount"]));
            } ?></p>
        <img src="<?= $product["picture_url"] ?>" alt="Photo of iPhone" height="200">
    </div>
<?php } ?>
</body>
</html>