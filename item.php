<?php
    $name = "Hello";
    $price = "1985€";
    $urlPhoto = "mr-bean.gif";

    include 'header.php'
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <title></title>
</head>
<body>
    <h1><?=$name?></h1>
    <p><?=$price?></p>
    <img src="Photo/<?=$urlPhoto?>" alt="<?=$urlPhoto?>">
</body>
</html>

<?php
include 'footer.php'
?>