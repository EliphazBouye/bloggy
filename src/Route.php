<?php

namespace Bloggy;

/**
 * Route class
 */
class Route{
    static private $routes = [];
    static private $query_params;
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
            
            $uri = self::$routes[$result_search]['uri'];
            $handler = explode('@', self::$routes[$result_search]['handler'][0]);
            $controller = $handler[0];
            $method  = $handler[1];

            if (str_contains($uri, ":")) {
                $param = explode(':', $uri);
                if (array_key_exists($param[1], $_GET) != null) {
                    self::$query_params = $_GET[$param[1]];
                    self::init_class($controller, $method, self::$query_params);
                } else {
                    echo "Key $param[1] is required";
                }
            }
        }
    }

    static private function init_class($controller, $method, $param) {
        $controller_folder = __DIR__ . "/controllers";
        $class_file = $controller_folder . '/' . $controller . '.php';

        if (file_exists($class_file)){
            require_once $class_file;

            $class_namespace = __NAMESPACE__ . '\\Controller\\' . $controller;
            $class = new $class_namespace();
            
            $reflection = new \ReflectionMethod($class, $method);
            if ($reflection->getNumberOfRequiredParameters() > 0) {
                return $class->$method($param);
            }

            return $class->$method();
        } else {
            trigger_error("Controller class don't exist", E_USER_ERROR);
        }
    }

}
