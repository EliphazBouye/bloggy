<?php

namespace Bloggy\Controller;

use Bloggy\App\Controller;

class TestController extends Controller {
  public function index(): string {
    echo "Test Controller!"; 
  }
}
