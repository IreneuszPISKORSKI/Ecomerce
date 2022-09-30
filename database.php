<?php


function connection(){

    $host = 'localhost';
    $user = 'ireneusz';
    $password = '123azerty';
    $database = 'shop';

    $dsn = "mysql:host=$host;dbname=$database;charset=utf8";

    $db = new PDO($dsn, $user, $password, [
        PDO::ATTR_EMULATE_PREPARES => false,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
    return $db;
}