<?php

use App\Controllers\TaskController;
use App\Controllers\AuthController;

// Public Routes (Anyone can access)
$routes->get('/', [TaskController::class, 'welcome']);
$routes->get('/tasks', [TaskController::class, 'list']);
$routes->get('/profile', [TaskController::class, 'profile']);
$routes->get('/about', [TaskController::class, 'about']);

$routes->get('/login', [AuthController::class, 'login']);
$routes->post('/login', [AuthController::class, 'processLogin']);
$routes->get('/logout', [AuthController::class, 'logout']);

// Protected Routes (Requires Login)
$routes->group('', ['filter' => 'auth'], function ($routes) {
    $routes->get('/tasks/new', [TaskController::class, 'new']);
    $routes->post('/tasks/create', [TaskController::class, 'create']);
    $routes->get('/tasks/edit/(:num)', [TaskController::class, 'edit/$1']);
    $routes->post('/tasks/update/(:num)', [TaskController::class, 'update/$1']);
    $routes->get('/tasks/archive/(:num)', [TaskController::class, 'archive/$1']);
});