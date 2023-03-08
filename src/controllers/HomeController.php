<?php

namespace Bloggy\Controller;
// use Bloggy\Core\Controller;

class HomeController  {
    public function test($age){
        echo "This is my controller from home $age , your name";
    }
    
    public function index(){
        echo "<h1>About us</h1>";
    }

    public function user_list($name, $slug){
        echo "Hello $name your slug is $slug";
    }
}