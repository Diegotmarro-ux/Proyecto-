<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'AuthController::welcome');

$routes->get('login', 'AuthController::login');

$routes->post('login/autenticar', 'AuthController::autenticar');

$routes->get('registro', 'AuthController::registro'); 

$routes->post('registro/guardar', 'AuthController::registrar');