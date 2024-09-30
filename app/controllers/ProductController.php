<?php

namespace Kurama\Controllers;

use Kurama\Library\Email;
use Kurama\Core\Library\Layout;

class ProductController
{

    public function index(string $item)
    {
       
        Layout::render('product', [
            'title' => 'Product Page',
            'item' => $item,           
            "class" => __CLASS__
        ]);       
       
    }

    /**
     * Index action method. Displays product information.
     *
     * @param string $item The item being displayed.
     *
     * @return void
     */
    public function show(
        string $item1,
        string $item2,
        Email $email
    ) {
       view('product2', [
            'title' => 'Product Page 2',
            'item1' => $item1,
            'item2' => $item2,           
        ]);
    }
}
