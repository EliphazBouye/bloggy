<?php

namespace Bloggy\Routes\Web;
use Bloggy\Route;
use Bloggy\Controller\HomeController;


Route::get('/test', function() {
    echo "<h1>Test page welcome to this new website</h1>";
});

Route::get('/home', ["HomeController@test"]);
Route::get('/about', ["HomeController@index"]);

// Route::get('/home', function() {
//     echo "Home page yay";
// });


Route::execute();