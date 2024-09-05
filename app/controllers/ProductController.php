<?php

namespace Kurama\controllers;

class ProductController
{
    public function index($item)
    {
        echo "<h1>Index da ". __CLASS__."</h1>";
        echo "<p>
        Temos o item:  $item na categoria;
        </p>";
    }
}