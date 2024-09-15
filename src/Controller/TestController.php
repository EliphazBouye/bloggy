<?php

namespace Bloggy\Controller;

use Bloggy\App\Controller;

class TestController extends Controller {
  public function index(): void {
    echo phpinfo(); 
  }
}
