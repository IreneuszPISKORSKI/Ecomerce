<?php
include "my-functions.php";
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
<!--<pre>--><?php
//    var_dump($_POST);
//    ?>
<!--</pre>-->
<div class="containerCart">
    <div>Product</div>
    <div>Price per unit</div>
    <div>Quantity</div>
    <div>Total</div>
</div>
<div class="containerCart">
    <div><?= $_POST["productName"] ?></div>

    <?php if ($_POST["productDiscount"] !== "0") { ?>
        <div>
            <div id="discountApply"><?php formatPrice($_POST["productPrice"]) ?></div>
            <div><?php formatPrice(discountedPrice($_POST["productPrice"], $_POST["productDiscount"])); ?></div>
        </div>
    <?php }else{ ?>
    <div><?php formatPrice($_POST["productPrice"]) ?></div>
        <?php } ?>

        <div><?= $_POST["productQuantity"] ?></div>

        <?php if ($_POST["productDiscount"] !== "0") { ?>
            <div><?php formatPrice(discountedPrice($_POST["productPrice"], $_POST["productDiscount"]) * $_POST["productQuantity"]) ?></div>
        <?php } else { ?>
            <div><?php formatPrice($_POST["productPrice"] * $_POST["productQuantity"]) ?></div>
        <?php } ?>
    </div>
    <br>
    <div class="containerSummary">
        <div class="summary">
            <div>Total HT</div>
            <div>TVA</div>
            <div>Total TTC</div>
        </div>
        <div class="summary">
            <?php if ($_POST["productDiscount"] !== "0") { ?>
                <div><?php formatPrice(priceExcludingVAT(discountedPrice($_POST["productPrice"], $_POST["productDiscount"]) * $_POST["productQuantity"])) ?></div>
                <div><?php formatPrice(discountedPrice($_POST["productPrice"], $_POST["productDiscount"]) * $_POST["productQuantity"] - priceExcludingVAT(discountedPrice($_POST["productPrice"], $_POST["productDiscount"]) * $_POST["productQuantity"])) ?></div>
                <div><?php formatPrice(discountedPrice($_POST["productPrice"], $_POST["productDiscount"]) * $_POST["productQuantity"]) ?></div>
            <?php } else { ?>
                <div><?php formatPrice(priceExcludingVAT($_POST["productPrice"] * $_POST["productQuantity"])) ?></div>
                <div><?php formatPrice($_POST["productPrice"] * $_POST["productQuantity"] - priceExcludingVAT($_POST["productPrice"] * $_POST["productQuantity"])) ?></div>
                <div><?php formatPrice($_POST["productPrice"] * $_POST["productQuantity"]) ?></div>
            <?php } ?>
        </div>

    </div>
</body>
</html>
