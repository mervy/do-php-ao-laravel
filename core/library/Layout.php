<?php

namespace Kurama\Core\Library;

use League\Plates\Engine;
use Kurama\Core\Exceptions\ViewNotFoundException;

class Layout
{
    public static function render(
        string $view,
        array $data = []
    ) {
        if (!file_exists(VIEW_PATH . '/' . $view . '.phtml')) {
            throw new ViewNotFoundException("View not found: [{$view}]");
        }
        $templates = new Engine(VIEW_PATH, );
        
        // Use as template::layout, partials::header, partials::footer, etc.
        $templates->addFolder('template', VIEW_PATH.'/template');
        $templates->addFolder('partials', VIEW_PATH.'/partials');
        $templates->setFileExtension('phtml');
       
        echo $templates->render($view, $data);
    }
}
