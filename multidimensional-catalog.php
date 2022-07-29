<?php
$products = [
    "iPhone" =>[
        "name" => "iPhone" ,
        "price" => 450,
        "weight" => 200,
        "discount" => "No!",
        "picture_url" => "image/iPhone.jpg"
        ],
    "iPad" => [
        "name" => "iPad",
        "price" => 450,
        "weight" => 400,
        "discount" => null,
        "picture_url" => "image/iPad.png"
    ]];
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
        <h3>Name: <?=$products["iPhone"]["name"]?></h3>
        <p>Price: <?=$products["iPhone"]["price"]?>€</p>
        <p>Weight: <?=$products["iPhone"]["weight"]?>g</p>
        <p>Discount: <?=$products["iPhone"]["discount"]?></p>
        <img src="<?=$products["iPhone"]["picture_url"]?>" alt="Photo of iPhone" height="500">
    </div>
    <div>
        <h3>Name: <?=$products["iPad"]["name"]?></h3>
        <p>Price: <?=$products["iPad"]["price"]?>€</p>
        <p>Weight: <?=$products["iPad"]["weight"]?>g</p>
        <p>Discount: <?=$products["iPad"]["discount"]?></p>
        <img src="<?=$products["iPad"]["picture_url"]?>" alt="Photo of iPhone" height="500">
    </div>
</body>
</html>