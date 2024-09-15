<?php

namespace Kurama\Controllers;

use Kurama\Core\Library\Layout;

class LoginController
{
    public function index()
    {
        Layout::render('login', ['title' => 'Login']);
    }
}