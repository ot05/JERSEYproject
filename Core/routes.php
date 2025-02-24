<?php

$router->addRoute('GET', '/', HomeController::class, 'index');
$router->addRoute('GET', '/about', TeamController::class, 'test');
$router->addRoute('GET', '/404', HomeController::class, 'notfound');
$router->addRoute('GET', '/register', UserController::class, 'register');
$router->addRoute('POST', '/register', UserController::class, 'store');
$router->addRoute('GET', '/login', UserController::class, 'login');
$router->addRoute('POST', '/login', UserController::class, 'authenticate');
