<?php

namespace Kurama\Controllers;

use Kurama\Core\Library\Layout;

class NotFoundController
{
    public function index(){
        view('404', ['title' => 'Homepage']);
    }

}
