<?php
session_start();
require_once 'database.php';
include "my-functions.php";
include "query.php";

if (!isset($_POST[0]) && !isset($_SESSION)) {
    header('Location: index.php');
    exit;
}

echo "<pre>Post:";
var_dump($_POST);
echo "</pre>";

if (isset ($_POST[0])) {
    foreach ($_POST as $key => $product) {

        if ($product['quantity'] > 0) {
            $_SESSION[$key]['quantity'] = $product['quantity'];
            $_SESSION[$key]['idItem'] = $product['product_id'];
        }
    }
}
echo "<pre>Session:";
var_dump($_SESSION);
echo "</pre>";
if (isset($db)) {
    $productsFromBD = $db->prepare(query: takeAllProducts());
    $productsFromBD->execute();
    $products = $productsFromBD->fetchAll();
} else {
    echo 'Something went wrong, the database is not available';
    exit();
}

//echo "<pre>Session:";
//var_dump($_SESSION);
//echo "</pre>";
//?>
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

<div class="validationButtonContainer">
    <a href="index.php">
        <button id="validationButton">Back</button>
    </a>
</div>
<div class="containerCart">
    <div>Product</div>
    <div>Price per unit</div>
    <div>Quantity</div>
    <div>Total</div>
</div>
<?php
for ($i = 0; $i < count($products); $i++) {
    if (isset($_SESSION[$i]['quantity'])) {
        ?>
        <div class="containerCart">
            <div id="containerCartName"><?= $products[$i]["name"] ?></div>
            <div><?php formatPrice($products[$i]["price"]) ?></div>
            <div><?= $_SESSION[$i]['quantity'] ?></div>
            <div><?php formatPrice($products[$i]["price"] * $_SESSION[$i]['quantity']) ?></div>
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
        <div>
            <?php formatPrice(allProductsPrice($_SESSION, $products) - allProductsExcludingVAT($_POST, $products)) ?>
        </div>
        <div>
            <?php formatPrice(allProductsExcludingVAT($_SESSION, $products)) ?>
        </div>
        <div>
            <?php formatPrice(allProductsPrice($_SESSION, $products)) ?>
        </div>
    </div>
</div>


<div class="validationButtonContainer">
    <a href="confirmation.php">
        <button id="validationButton">Order now</button>
    </a>
</div>

</body>
</html>
