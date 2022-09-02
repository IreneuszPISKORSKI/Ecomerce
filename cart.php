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

//echo "<pre>Post:";
//var_dump($_POST);
//echo "</pre>";

$_SESSION['downloadItems'] = "";
if (isset ($_POST[0]['quantity'])) {
    $counting = 0;
    foreach ($_POST as $product) {

        if ($product['quantity'] > 0) {
            $_SESSION['items'][$counting]['quantity'] = $product['quantity'];
            $_SESSION['items'][$counting]['idItem'] = $product['product_id'];
            $_SESSION['downloadItems'] = $_SESSION['downloadItems'] . "product_id =  {$product['product_id']}  or ";
            $_SESSION['orderedProduct'] = new OrderAcceptedProducts($db, $product['product_id'], $product['quantity']);
            $counting++;
        }
    }
}

if (isset($db)) {
    $products = getProductsByID($db);                                                                                   //get products by id
} else {
    echo 'Something went wrong, the database is not available';
    exit();
}


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
}

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
            <?= formatPrice(allProductsPrice($_SESSION, $products) - allProductsExcludingVAT($_POST, $products)) ?>
        </div>
        <div>
            <?= formatPrice(allProductsExcludingVAT($_SESSION, $products)) ?>
        </div>
        <div>
            <?= formatPrice(allProductsPrice($_SESSION, $products)) ?>
        </div>
    </div>
</div>

<?php
$totalPriceAll =allProductsPrice($_SESSION, $products);
$_SESSION['order'] = new OrderAccepted($db, $totalPriceAll); ?>

<pre>All items in stock:
<?php var_dump($_SESSION['order']); ?>
</pre>

<div class="validationButtonContainer">
    <a href="confirmation.php">
        <button id="validationButton">Order now</button>
    </a>
</div>

</body>
</html>
