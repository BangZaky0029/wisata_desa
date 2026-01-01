<?php

use CodeIgniter\Router\RouteCollection;

$routes->get('/', function () {
    return redirect()->to('dashboard');
});

$routes->get('auth/login', 'Auth::login');
$routes->post('auth/login', 'Auth::attemptLogin');
$routes->get('auth/logout', 'Auth::logout');


$routes->group('', ['filter' => 'auth'], function($routes) {
    $routes->get('dashboard', 'Dashboard::index');
    
    // DESA Routes
    $routes->get('desa', 'DesaController::index');
    $routes->get('desa/create', 'DesaController::create');
    $routes->post('desa/store', 'DesaController::store');
    $routes->get('desa/edit/(:num)', 'DesaController::edit/$1');
    $routes->post('desa/update/(:num)', 'DesaController::update/$1');
    $routes->get('desa/delete/(:num)', 'DesaController::delete/$1');
    
    // PAKET Routes
    $routes->get('paket', 'PaketController::index');
    $routes->get('paket/create', 'PaketController::create');
    $routes->post('paket/store', 'PaketController::store');
    $routes->get('paket/edit/(:num)', 'PaketController::edit/$1');
    $routes->post('paket/update/(:num)', 'PaketController::update/$1');
    $routes->get('paket/delete/(:num)', 'PaketController::delete/$1');
    
    // EVENT Routes
    $routes->get('event', 'EventController::index');
    $routes->get('event/create', 'EventController::create');
    $routes->post('event/store', 'EventController::store');
    $routes->get('event/edit/(:num)', 'EventController::edit/$1');
    $routes->post('event/update/(:num)', 'EventController::update/$1');
    $routes->get('event/delete/(:num)', 'EventController::delete/$1');
    
    // USER Routes
    $routes->get('user', 'UserController::index');
    $routes->get('user/create', 'UserController::create');
    $routes->post('user/store', 'UserController::store');
    $routes->get('user/edit/(:num)', 'UserController::edit/$1');
    $routes->post('user/update/(:num)', 'UserController::update/$1');
    $routes->get('user/delete/(:num)', 'UserController::delete/$1');
});



