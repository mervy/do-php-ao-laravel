<?php

use Kurama\Core\Library\App;

require '../core/helpers/constants.php';
require '../core/helpers/functions.php';


$app = App::create()
    ->withSetTimeZone()
    ->withShowErrorsForDebug()
    ->withEnvironmentVariables()
    ->withErrorPage()
    ->withContainer();
