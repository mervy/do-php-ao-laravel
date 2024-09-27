<?php

namespace Kurama\Controllers;

use Kurama\Core\Library\Layout;

class NotFoundController
{
    public function index(){
        Layout::render('404', ['title' => 'Homepage']);
    }

}
