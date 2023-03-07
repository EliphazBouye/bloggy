<?php

namespace Bloggy;
/**
 * Route class
 */
class Route{
    static private $routes = [];

    /**
     * get handle for get method
     * Params
     * $uri string
     * $callback callable
     * $name string
     */
    static public function get(string $uri,callable | array $handler, string $name = "" ) {
        // TODO make some verification for validate uri
        array_push(self::$routes, array('uri' => $uri, 'handler' => $handler, 'method' => 'GET'));
    }

    static public function execute() {
        $result_search = array_search($_SERVER['REQUEST_URI'], array_column(self::$routes, 'uri'));
        if (is_callable(self::$routes[$result_search]['handler'])) {
            return self::$routes[$result_search]['handler']();
        } else if (gettype(self::$routes[$result_search]['handler']) === 'array') {
            $handler = explode('@', self::$routes[$result_search]['handler'][0]);
            $controller = $handler[0];
            $method  = $handler[1];
            // var_dump("controller class : $controller");
            self::init_class($controller, $method);
        }
    }

    static private function init_class($controller, $method) {
        $controller_folder = __DIR__ . "/controllers";
        $class_file = $controller_folder . '/' . $controller . '.php';

        if (file_exists($class_file)){
            require_once $class_file;

            $class_namespace = __NAMESPACE__ . '\\Controller\\' . $controller;
            $class = new $class_namespace();
            return $class->$method();
        } else {
            trigger_error("Controller class don't exist", E_USER_ERROR);
        }
    }

}
