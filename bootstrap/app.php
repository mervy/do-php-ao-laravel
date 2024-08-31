<?php

use Dotenv\Dotenv;
use DI\ContainerBuilder;
use Spatie\Ignition\Ignition;

session_start();
date_default_timezone_set('America/Sao_Paulo');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require '../core/helpers/constants.php';
require '../core/helpers/functions.php';

$dotenv = Dotenv::createImmutable(dirname(__FILE__, 2));
$dotenv->load();

Ignition::make()
    ->setTheme('dark')  //dark, light
    ->shouldDisplayException(env('ENV') === 'development')
    ->register();


$builder = new ContainerBuilder();
$container = $builder->build();