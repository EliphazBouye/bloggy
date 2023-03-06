<?php

namespace Bloggy\Routes\Web;
use Bloggy\Route;


Route::get('/test', function() {
    echo "Test page welcome to this new website";
});

Route::get('/home', function() {
    echo "Home page yay";
});


Route::execute();