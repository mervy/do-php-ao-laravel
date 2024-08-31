<?php

namespace Kurama\controllers;

class ProductController
{
    public function indexx($item, $item2)
    {
        echo "<h1>Index da ". __CLASS__."</h1>";
        echo "<p>
        Temos o item:  $item na categoria $item2
        </p>";
    }
}