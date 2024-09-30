<?php

use Kurama\Core\Library\Layout;

function view($view, $data=[])
{
    return Layout::render($view,$data);
}