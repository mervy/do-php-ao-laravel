<?php

namespace Kurama\Controllers;

use Kurama\Core\Library\Layout;

class HomeController
{
    public function index()
    {
        
       view('home', ['title' => 'Homepage']);
    }
}
