<?php

namespace Bloggy\App\Controller;

use Bloggy\Core\Controller;

class HomeController extends Controller {
  public function index(): void {
      $title = "First article!";
      $content = "This is a test content from the controller";
      $this->render('home', ['title' => $title, 'content' => $content]);
  }

  public function second(): void {
  }
}
