<?php
include "clientsClass.php";
class ClientList
{
    public array $clientsList;

    public function __construct($allClients)
    {
        echo "<div class='clientsList'><div class='client' >id</div><div class='client' >First name</div><div class='client' >Last name</div><div class='client' >Address</div><div class='client'>Zip code</div><div class='client'>City</div> <button disabled class='client dis'> Edit: </button>  <button disabled class='client dis'>Delete:</button></div>";
        foreach ($allClients as $key => $client) {
            $clientInList[$key] = new Client(
                $client["customer_id"],
                $client["first_name"],
                $client["last_name"],
                $client["address"],
                $client["zip_code"],
                $client["city"]
            );
            $this->clientsList = $clientInList;
            echo<<<HTML
<div class="clientsList">
<div class="client">{$clientInList[$key]->customer_id}</div><div class="client">{$clientInList[$key]->first_name}</div><div class="client">{$clientInList[$key]->last_name}</div> <div class="client">{$clientInList[$key]->address}</div><div class="client">{$clientInList[$key]->zip_code}</div> <div class="client">{$clientInList[$key]->city}</div> <button class="client">Edit</button> <button class="client">Delete</button> </div>
HTML;
        }
    }
}