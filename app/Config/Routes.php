<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'AuthController::welcome');

$routes->get('login', 'AuthController::login');

$routes->post('login/autenticar', 'AuthController::autenticar');

$routes->get('registro', 'AuthController::registro'); 

$routes->post('registro/guardar', 'AuthController::registrar');

$routes->get('recuperar', 'AuthController::recuperar');

$routes->post('enviar-recuperacion', 'AuthController::enviarRecuperacion');

$routes->get('restablecer/(:segment)', 'AuthController::restablecer/$1');

$routes->post('guardar-nueva-password', 'AuthController::guardarNuevaPassword');

$routes->get('/maestra', 'MaestraController::index', ['filter' => 'authFilter:admin']);

$routes->get('/estudiante', 'EstudianteController::index', ['filter' => 'authFilter']);

$routes->get('/maestra', 'MaestraController::index');

$routes->get('/estudiante', 'EstudianteController::index');

$routes->get('/logout', 'AuthController::logout'); 