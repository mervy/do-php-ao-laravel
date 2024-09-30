<?php

namespace Kurama\Controllers;

use Kurama\Core\Library\Layout;

class DashboardController
{
    public function index()
    {
        view('dashboard', ['title' => 'Dashboard']);
    }
}
