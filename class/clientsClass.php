<?php
//stworzeenie klasy klientow to tworzenia obiektow https://miroslawzelent.pl/kurs-php/poznajemy-biblioteke-pdo/

class Clients{
    public string $first_name;
    public string $last_name;
    public string $address;
    public int $zip_code;
    public string $city;

    function __construct($first_name, $last_name, $address, $zip_code, $city)
    {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->address = $address;
        $this->zip_code = $zip_code;
        $this->city = $city;
    }
}