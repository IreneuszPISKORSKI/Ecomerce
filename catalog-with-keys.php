<?php
$iPhone = [
    "name" => "iPhone",
    "price" => 9001,
    "weight" => 135,
    "discount" => null,
    "picture_url" => "image/iPhone.jpg"
]
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
    <h3>Name: <?= $iPhone["name"] ?></h3>
    <p>Price: <?= $iPhone["price"] ?>€</p>
    <p>Weight: <?= $iPhone["weight"] ?>kg</p>
    <p>Discount: <?= $iPhone["discount"] ?></p>
    <img src="<?= $iPhone["picture_url"] ?>" alt="Photo of iPhone" height="500">
</div>
</body>
</html>

