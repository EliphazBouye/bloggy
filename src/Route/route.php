<?php

namespace Bloggy\Route;

use Bloggy\Core\Route;
use Bloggy\App\Controller\HomeController;
use Bloggy\App\Controller\TestController;

// Route::get('/test', [TestController::class, 'index'], 'test');
Route::get('/', [HomeController::class, 'index'], 'home');
