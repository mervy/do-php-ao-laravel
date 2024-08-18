<?php

require '../vendor/autoload.php';
require '../bootstrap/app.php';
require '../routes/web.php';

class HomeController
{
    function index()
    {
        view('home');
        dd($_SESSION);
    }
    
}

(new HomeController)->index();