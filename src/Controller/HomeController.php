<?php

namespace Bloggy\Controller;

use Bloggy\App\Controller;

class HomeController extends Controller {
  public function index(): void {
    echo "Home Controller!"; 
    echo "This is the home page!"; 
  }
}
