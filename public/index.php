<?php

require '../vendor/autoload.php';
require '../bootstrap/app.php';
require '../routes/web.php';

class HomeController
{
    function index()
    {
      
    }
    
}

(new HomeController)->index();