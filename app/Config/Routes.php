<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'AuthController::welcome');

$routes->get('login', 'AuthController::login');

$routes->post('login/autenticar', 'AuthController::autenticar');

$routes->get('registro', 'AuthController::registro'); 

$routes->get('idioma/(:segment)', 'AuthController::cambiarIdioma/$1');

$routes->post('registro/guardar', 'AuthController::registrar');

$routes->get('recuperar', 'AuthController::recuperar');

$routes->post('enviar-recuperacion', 'AuthController::enviarRecuperacion');

$routes->get('restablecer/(:segment)', 'AuthController::restablecer/$1');

$routes->post('guardar-nueva-password', 'AuthController::guardarNuevaPassword');

$routes->get('/maestra', 'MaestraController::index', ['filter' => 'authFilter:admin']);

$routes->get('/estudiante', 'EstudianteController::index', ['filter' => 'authFilter']);

$routes->get('/logout', 'AuthController::logout'); 

$routes->get('/perfil/editar', 'PerfilController::editar');

$routes->post('/perfil/guardar', 'PerfilController::guardar');

$routes->get('/perfil', 'PerfilController::index');

$routes->get('/perfil/validar-password', 'PerfilController::validarPassword');

$routes->post('/perfil/verificar-password', 'PerfilController::verificarPassword');


$routes->get('/perfil/cambiar-password', 'PerfilController::cambiarPassword');

$routes->post('/perfil/guardar-password', 'PerfilController::guardarPassword');


$routes->get('/perfil/cambiar-foto', 'PerfilController::cambiarFoto');

$routes->post('/perfil/guardar-foto', 'PerfilController::guardarFoto');


$routes->get('/perfil/eliminar-foto', 'PerfilController::eliminarFoto'); 

$routes->post('/perfil/confirmar-eliminar-foto', 'PerfilController::confirmarEliminarFoto');

$routes->get('/usuarios', 'UsuarioController::index', ['filter' => 'authFilter:admin']);

$routes->get('/usuarios/nuevo', 'UsuarioController::nuevo', ['filter' => 'authFilter:admin']);

$routes->post('/usuarios/guardar', 'UsuarioController::guardar', ['filter' => 'authFilter:admin']);