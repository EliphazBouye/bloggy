<?php

namespace Bloggy\App\Controller;

use Bloggy\Core\Controller;

class TestController extends Controller {
  public function index(): void {
    echo phpinfo(); 
  }
}
