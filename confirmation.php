<?php
include "class/orderAccepted.php";
include "class/orderAcceptedProducts.php";
session_start();
require_once 'database.php';
include "query.php";
include "my-functions.php";

$db = connection();

sendOrder($db);
sendItemsInOrder($db);

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

<h1>The order has been placed successfully!</h1>

<div class="validationButtonContainer">
    <a href="clear-session.php">Go back to the main page</a>
</div>
<?php clearSessionFromProducts(); ?>
</body>
</html>
