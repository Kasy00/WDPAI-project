<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Routing::get('', 'DefaultController');
Routing::get('index', 'DefaultController');
Routing::get('home', 'DefaultController');
Routing::get('profile', 'DefaultController');
Routing::get('about', 'DefaultController');
Routing::post('login', 'SecurityController');
Routing::post('logout', 'SecurityController');
Routing::post('register', 'SecurityController');
Routing::post('addAvatar', 'FileController');
Routing::post('calculateBMI', 'BMIController');
Routing::post('add_favorite', 'RecipeController');
Routing::post('get_favorites', 'RecipeController');
Routing::run($path);