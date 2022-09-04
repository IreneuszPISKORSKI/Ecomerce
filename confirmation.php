<?php
//wyslanie zamowienia siedzacego w sesji - query i wyswietlenie informacji o tym
include "class/orderAccepted.php";
include "class/orderAcceptedProducts.php";
session_start();
require_once 'database.php';
include "query.php";

$db = connection();

sendOrder($db);
sendItemsInOrder($db);

echo "Poooooszlooooo!";

session_unset();
