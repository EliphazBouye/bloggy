<?php

namespace Bloggy\Route;

use Bloggy\App\Route;
use Bloggy\Controller\HomeController;
use Bloggy\Controller\TestController;

Route::get('/test', [TestController::class, 'index'], 'test');
Route::get('/', [HomeController::class, 'index'], 'home');
