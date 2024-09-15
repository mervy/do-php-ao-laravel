<?php

namespace Kurama\Controllers;

use Kurama\Core\Library\Layout;

class HomeController
{
    public function index()
    {
        
        Layout::render('home', ['title' => 'Homepage']);
    }
}
