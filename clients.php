<?php
include "class/clientList.php";
require_once "database.php";
include "query.php";
//strona listy klientow i zarzadzanie nimi (dodawanie, usuwanie itd) https://miroslawzelent.pl/kurs-php/poznajemy-biblioteke-pdo/
$db = connection();
$allClients= getAllClients($db);

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

<?php $clients = new ClientList($allClients); ?>

<h2>Add a new client</h2>
<form action="editClient.php" method="post">
<label for="first_name">First Name:
    <input type="text" name="first_name">
</label>
    <label for="last_name">Last name:
        <input type="text" name="last_name">
    </label>
    <label for="address">Address:
        <input type="text" name="address">
    </label>
    <label for="zip_code">Zip code:
        <input type="number" name="zip_code">
    </label>
    <label for="city">City:
        <input type="text" name="city">
    </label>
    <button class="client">Add Client</button>
</form>

</body>
</html>