<?php

namespace Bloggy\App;

class Route {
  public function __construct()
  { }

  
  /*
   * @param $hander
   * @param $name
  */
  static public function get(string $url, array $handler, string $name): void {
    // var_dump($handler);
    
    // $class_methods = get_class_methods($handler[0]);
    // $find_method = array_search($handler[1], $class_methods);
    // var_dump($class_methods[$find_method]);

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
}
