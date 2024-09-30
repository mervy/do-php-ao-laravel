<?php

namespace Kurama\Controllers;

use Kurama\Core\Library\Layout;

class LoginController
{
    public function index()
    {
        view(
            'login',
            ['title' => 'Login']
        );
    }
}
