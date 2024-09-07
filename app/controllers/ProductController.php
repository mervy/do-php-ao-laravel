<?php

namespace Kurama\Controllers;

use Kurama\Library\Email;

class ProductController
{

 public function index(string $item){
    echo "<h1>Index da " . __CLASS__ . "</h1>";  
    echo "<p>Item 1 é: $item </p>" ;  
 }

    /**
     * Index action method. Displays product information.
     *
     * @param string $item The item being displayed.
     *
     * @return void
     */
    public function show(
        string $item,
        string $item2,
        Email $email
        )
    {
        // Display a heading indicating the current class
        echo "<h1>Index da " . __CLASS__ . "</h1>";  
        echo "<p>Item 1 é: $item e item 2 é $item2</p>" ;    
              
        // Dump the Email library instance for debugging purposes
        dd($email);
    }
}
