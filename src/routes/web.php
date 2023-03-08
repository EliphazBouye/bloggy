<?php

namespace Bloggy\Routes\Web;
use Bloggy\Route;
use Bloggy\Controller\HomeController;

// Route::get('/user/:name', ["HomeController@user_list"]);
Route::get('/user/:name/profile/:slug', ["HomeController@user_list"]);

Route::get('/test/:age/:name', function() {
    echo "<h1>Test page welcome to this new website</h1>";
});

// TODO check if a uri is already use by another route
Route::get('/home', ["HomeController@test"]);
Route::get('/about', ["HomeController@index"]);

// Route::get('/home', function() {
//     echo "Home page yay";
// });


Route::execute();