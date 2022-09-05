<?php

class Catalog
{
    public array $catalog;

    public function __construct($products)
    {
        foreach ($products as $key => $product) {
            $itemsInStock[$key] = new ItemInStock(
                $product["name"],
                $product["product_id"],
                $product["price"],
                $product["weight"],
                $product["available"],
                $product["description"],
                $product["stock"],
                $product["category_id"],
                $product["image_url"]
            );
        }
        $this->catalog = $itemsInStock;
    }

    function displayCatalog():void
    {
        echo '<div class="containerAll">';
        foreach ($this->catalog as $i => $product) {
            echo $product->displayItem($i);
        }
        echo '</div>';
    }
}