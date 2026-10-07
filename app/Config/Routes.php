<?php

use App\Controllers\TaskController;

$routes->get('/', [TaskController::class, 'welcome']);
$routes->get('/tasks', [TaskController::class, 'list']);
$routes->get('/profile', [TaskController::class, 'profile']);
$routes->get('/about', [TaskController::class, 'about']);