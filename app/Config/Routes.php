<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

$routes->get('/posts', 'PostsController::index');
$routes->get('/posts/create', 'PostsController::create');
$routes->post('/posts/store', 'PostsController::store');

$routes->get('/posts/(:num)', 'PostsController::show/$1');

$routes->get('/posts/edit/(:num)', 'PostsController::edit/$1');   // ✅ ADD
$routes->post('/posts/update/(:num)', 'PostsController::update/$1'); // ✅ ADD
$routes->get('/posts/delete/(:num)', 'PostsController::delete/$1'); // ✅ ADD
