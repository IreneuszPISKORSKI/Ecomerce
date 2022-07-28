<?php
    $name = "Hello";
    $price = "1985€";
    $urlPhoto = "mr-bean.gif";
    $altOfPhoto = "Gif of Mr Bean";
    include 'header.php';
?>


<html>
    <body>
        <h1><?= $name ?></h1>
        <p><?= $price ?></p>
        <img src="image/<?= $urlPhoto ?>" alt="<?= $altOfPhoto ?>">
    </body>
</html>

<?php
include 'footer.php';
?>