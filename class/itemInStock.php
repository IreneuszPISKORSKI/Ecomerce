<?php

class ItemInStock
{
    private string $name;
    private int $product_id;
    private int $price;
    private int $weight;
    private int $available;
    private string $description;
    private int $stock;
    private int $category_id;
    private string $image_url;



    function __construct($name, $product_id, $price, $weight, $available, $description, $stock, $category_id, $image_url)
    {
        $this->name = $name;
        $this->product_id = $product_id;
        $this->price = $price;
        $this->weight = $weight;
        $this->available = $available;
        $this->description = $description;
        $this->stock = $stock;
        $this->category_id = $category_id;
        $this->image_url = $image_url;
    }

    function displayItem($key): string
    //getter
    {
        return '<div><div class="containerItem"><div><img src="'
            . $this->image_url
            . '" alt="Photo of iPhone" height="100"></div><div><h3>Name:'
            . $this->name
            . '</h3><p>Description:'
            . $this->description
            . '</p> </br> <p>Price: '
            . formatPrice($this->price)
            . '</p> </br> <p>Weight: '
            . $this->weight
            . 'g</p><label for="quantity">Quantity: <input type="number" name="'
            . $key
            . '[quantity]" value="0" min="0"></label><input type="hidden" name="'
            . $key
            . '[product_id]" value="'
            . $this->product_id
            . '"></div></div></div>';

//    return<<<HTML
//<div>
//    <div class="containerItem"><div>
//        <img src="{$image_url}" alt="Photo of iPhone" height="100">
//    </div>
//    <div>
//        <h3>Name: {$name}</h3>
//        <p>Description: {$description}</p>
//        <p>Price: {formatPrice($price)}</p>
//        <p>Weight: {$weight}g</p>
//        <label for="quantity">Quantity: <input type="number" name="{$key}[quantity]" value="0" min="0"></label>
//        <input type="hidden" name="{$key}[product_id]" value="{$product_id}">
//        </div>
//    </div>
//</div>
//HTML;
    }
}