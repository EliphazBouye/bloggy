<?php

namespace Bloggy\Route;

use Bloggy\App\Route;
use Bloggy\Controller\TestController;

Route::get('/home', [TestController::class, 'index'], 'home');
