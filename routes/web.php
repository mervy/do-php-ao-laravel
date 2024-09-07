<?php

use Kurama\Core\library\Router;
use Kurama\Controllers\HomeController;
use Kurama\Controllers\LoginController;
use Kurama\Controllers\ProductController;
use Kurama\Controllers\DashboardController;


$router = new Router($app->container);
$router->add('GET', '/', [HomeController::class, 'index']);
$router->add('GET', '/product/([a-z\-]+)', [ProductController::class, 'index']);
//Atentar ao uso dos () em ([a-z\-]+)
$router->add('GET', '/product/([a-z\-]+)/category/([a-z\-]+)', [ProductController::class, 'show']);
$router->add('GET', '/login', [LoginController::class, 'index']);
$router->add('POST', '/dashboard', [DashboardController::class, 'index']);
$router->execute();