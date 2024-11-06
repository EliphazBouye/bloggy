<?php

namespace Bloggy\Core;

class Route {
  public function __construct()
  { }

  /*
   * @param $hander
   * @param $name
  */
  static public function get(string $uri, array $handler, string $name = null): void {
    if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
      throw new \Exception("Error this method is not allowed here!"); 
    }

    if ($_SERVER['PHP_SELF'] == '/index.php' || $_SERVER['PHP_SELF'] == '/index.php' . $uri) {
      try {
        // Target our class
        $class = new \ReflectionClass($handler[0]);

        // Get method
        $method = $class->getMethod($handler[1]);

        $method->invoke(new $handler[0]);

      } catch (\ReflectionException $e) {
        throw new \ErrorException($e->getMessage());
      }
    }

    else {
      throw new \Exception("This route dons't exist"); 
    } 
  }
}
