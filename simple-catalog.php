<?php

    $products = ["iPhone", "iPad", "iMac"];
    sort($products);

    echo $products[0];
    echo "<br>";
    echo $products[count($products)-1];
    echo "<br>";
    echo "<br>";


    echo "Loop foreach:";
    foreach ($products as $number => $name){
        if ($number!=1) {
            echo $name . "<br>";
        }
    }
    echo "<br>";
    echo "<br>";
    echo "Loop for:";
    for ($i=0; $i<3; $i++){
        if ($i!=1) {
            echo $products[$i]. "<br>";
        }
    }