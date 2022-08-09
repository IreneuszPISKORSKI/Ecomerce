<?php
include "my-functions.php";
    session_start();

    if (isset ($_POST)){
    foreach ($_POST as $modelTel => $product) {
        $_SESSION[$modelTel]["quantity"] = $product["quantity"];
        $_SESSION[$modelTel]["name"] = $product["name"];
        $_SESSION[$modelTel]["price"] = $product["price"];
        $_SESSION[$modelTel]["discount"] = $product["discount"];
        $_SESSION[$modelTel]["weight"] = $product["weight"];
        }
    }

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
//    echo "Post:";
//    var_dump($_POST);
//    ?>
<!--</pre>-->
<!--<pre>--><?php
//    echo "Session:";
//    var_dump($_SESSION);
//    ?>
<!--</pre>-->
<pre>Transport:<?php
    echo "Get:";
    var_dump($_GET);
    ?>
</pre>
<div class="containerCart">
    <div>Product</div>
    <div>Price per unit</div>
    <div>Quantity</div>
    <div>Total</div>
</div>
<?php
foreach ($_SESSION as $modelTel => $product){
    if ($product["quantity"]>0){
?>
<div class="containerCart">
    <div><?= $product["name"] ?></div>

    <?php if ($product["discount"] !== "0") { ?>
        <div>
            <div id="discountApply"><?php formatPrice($product["price"]) ?></div>
            <div><?php formatPrice(discountedPrice($product["price"], $product["discount"])); ?></div>
        </div>
    <?php } else { ?>
        <div><?php formatPrice($product["price"]) ?></div>
    <?php } ?>

    <div><?= $product["quantity"] ?></div>

    <?php if ($product["discount"] !== "0") { ?>
        <div><?php formatPrice(discountedPrice($product["price"], $product["discount"]) * $product["quantity"]) ?></div>
    <?php } else { ?>
        <div><?php formatPrice($product["price"] * $product["quantity"]) ?></div>
    <?php } ?>
</div>
<?php }
} ?>
<br/>
<div class="containerSummary">
    <div class="summary">
        <div>Total HT</div>
        <div>TVA</div>
        <div>Total TTC</div>
    </div>
    <div class="summary">
        <?php if ($product["discount"] !== "0") { ?>
            <div><?php formatPrice(allProductsExcludingVAT($product["price"], $product["discount"], $product["quantity"])) ?></div>
            <div><?php formatPrice(discountedPrice($product["price"], $product["discount"]) * $product["quantity"] - allProductsExcludingVAT($product["price"], $product["discount"], $product["quantity"])) ?></div>
        <?php } else { ?>
            <div><?php formatPrice(priceExcludingVAT($product["price"] * $product["quantity"])) ?></div>
            <div><?php formatPrice($product["price"] * $product["quantity"] - priceExcludingVAT($product["price"] * $product["quantity"])) ?></div>
            <div><?php formatPrice($product["price"] * $product["quantity"]) ?></div>
        <?php } ?>
    </div>
</div>
<hr>

<div class="transporter">
    <form action="cart.php" method="get">
        <label for="dropdown">Select transporter:
            <select name="dropdown">
                <option value="">Choose wisely</option>
                <option value="first">DPD</option>
                <option value="second">La poste</option>
                <option value="third">Pickup in person</option>
            </select>
        </label>
        <button>Confirm</button>
    </form>

    <?php switch ($_GET["dropdown"]="") {
        case "first":
            echo "1st option";
            break;
        case "second":
            echo "2nd option";
            break;
        case "third":
            echo "3th option";
            break;
        default:
            break;
    } ?>
</div>
<div class="containerSummary">
    <div class="summary">
        <div>Transport:</div>
        <div>Weight:</div>
        <div>Shipping cost:</div>
        <div>Total price:</div>
    </div>
    <div class="summary">
        <div>Total HT</div>
<!--        <div>--><?php //shippingWeight($_SESSION[$modelTel]["quantity"], $_SESSION[$modelTel]["weight"]) ?><!--</div>-->
        <div>Total TTC</div>
        <div>Total TTC</div>
    </div>
</div>
</body>
</html>
