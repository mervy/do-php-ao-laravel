<?php

use Kurama\Core\library\Router;
use Kurama\controllers\HomeController;
use Kurama\controllers\LoginController;
use Kurama\controllers\ProductController;
use Kurama\controllers\DashboardController;


$router = new Router($container);
$router->add('GET', '/', [HomeController::class, 'index']);
$router->add('GET', '/product/([a-z\-]+)', [ProductController::class, 'index']);
//Atentar ao uso dos () em ([a-z\-]+)
$router->add('GET', '/product/([a-z\-]+)/category/([a-z\-]+)', [ProductController::class, 'index']);
$router->add('GET', '/login', [LoginController::class, 'index']);
$router->add('POST', '/dashboard', [DashboardController::class, 'index']);
$router->execute();