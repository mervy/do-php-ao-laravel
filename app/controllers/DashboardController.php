<?php

namespace Kurama\Controllers;

use Kurama\Core\Library\Layout;

class DashboardController
{
    public function index()
    {
        Layout::render('dashboard', ['title' => 'Dashboard']);
    }
}
