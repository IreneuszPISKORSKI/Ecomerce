<?php
session_start();

require_once 'database.php';
include "my-functions.php";
include "query.php";
include "class/itemsInOrder.php";
include "class/orderAccepted.php";
include "class/orderAcceptedProducts.php";

$db = connection();

if (!isset($_POST[0]['quantity']) && !isset($_SESSION[0]['quantity'])) {
    header('Location: index.php');
    exit;
}

$_SESSION['downloadItems'] = "";
if (isset ($_POST[0]['quantity'])) {
    $counting = 0;
    $thisOrderId = (lastOrderId($db)[0]['order_id']+1);
    foreach ($_POST as $product) {

        if ($product['quantity'] > 0) {
            $_SESSION['items'][$counting]['quantity'] = $product['quantity'];
            $_SESSION['items'][$counting]['idItem'] = $product['product_id'];

            if ($counting==0) {
                $_SESSION['downloadItems'] = "product_id =  {$product['product_id']}";
            }else{
                $_SESSION['downloadItems'] = $_SESSION['downloadItems'] . " or product_id =  {$product['product_id']}";
            }

            $_SESSION['orderedProduct'][$counting] = new OrderAcceptedProducts($thisOrderId, $product['product_id'], $product['quantity'], $counting);
            $counting++;
        }
    }
}

$products = getProductsByID($db);

//echo "<pre>Order:";
//var_dump($_SESSION['order']);
//echo "</pre>";

foreach ($products as $key => $product) {
    $_SESSION['object'][$key] = new ItemsInOrder(
        $product["name"],
        $product["product_id"],
        $product["price"],
        $product["weight"],
        $product["available"]
    );
    $_SESSION['orderedProduct'][$key]->total_product_price = $_SESSION['orderedProduct'][$key]->quantity * $_SESSION['object'][$key]->price;
    $_SESSION['orderedProduct'][$key]->total_product_weight = $_SESSION['orderedProduct'][$key]->quantity * $_SESSION['object'][$key]->weight;
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
    if (isset($_SESSION['items'])) {
        ?>
        <div class="containerCart">
            <div id="containerCartName"><?= $_SESSION['object'][$i]->name ?></div>
            <div><?= formatPrice($_SESSION['object'][$i]->price) ?></div>
            <div><?= $_SESSION['items'][$i]['quantity'] ?></div>
            <div><?= formatPrice($_SESSION['object'][$i]->price * $_SESSION['items'][$i]['quantity']) ?></div>
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
            <?= formatPrice(allProductsPrice() - allProductsExcludingVAT($_POST, $products)) ?>
        </div>
        <div>
            <?= formatPrice(allProductsExcludingVAT($_SESSION, $products)) ?>
        </div>
        <div>
            <?= formatPrice(allProductsPrice()) ?>
        </div>
    </div>
</div>
<!--<pre>All items in stock:-->
<?php //var_dump($_SESSION); ?>
<!--</pre>-->

<?php
$totalPriceAll =allProductsPrice();
$totalWeightAll = allProductsWeight();
$_SESSION['order'] = new OrderAccepted($db, $totalPriceAll, $totalWeightAll); ?>

<!--<pre>Order:-->
<?php //var_dump($_SESSION['order']); ?>
<!--All products in order:-->
<?php //var_dump($_SESSION['orderedProduct']); ?>
<!--</pre>-->

<div class="validationButtonContainer">
    <a href="confirmation.php">
        <button id="validationButton">Order now</button>
    </a>
</div>

</body>
</html>