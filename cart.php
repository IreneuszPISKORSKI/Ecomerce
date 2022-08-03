<?php
include "my-functions.php";
var_dump($_POST);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <title>Cart</title>
</head>
<body>
    <div class="containerCart">
        <div>Product</div>
        <div>Price per unit</div>
        <div>Quantity</div>
        <div>Total</div>
    </div>
    <div class="containerCart">
        <div><?=$_POST['product[\'name\']']?></div>
<!--        <div>--><?php //formatPrice($_POST["product"['price']]) ?><!--</div>-->
        <div>Quantity</div>
        <div>Total</div>
    </div>

<!--    --><?php //foreach ($_POST as $modelTel => $product) { ?>

    <div class="containerSummary">
        <div class="summary">
            <div>Total HT</div>
            <div>TVA</div>
            <div>Total TTC</div>
        </div>
        <div class="summary">
            <div>ex 132</div>
            <div>ex 21</div>
            <div>ex 153</div>
        </div>

    </div>
</body>
</html>
