<?php

const BASE_PATH = __DIR__ . '/';
require_once BASE_PATH . 'Core/functions.php';

require_once root_path('Controllers/TeamController.php');
require_once root_path('Controllers/HomeController.php');
require_once root_path('Controllers/UserController.php');
require_once root_path('Core/Router.php');

$uri = $_SERVER["REQUEST_URI"];


$router = new Router();

$routes = require root_path('Core/routes.php');
$router->matchRoute($uri);
