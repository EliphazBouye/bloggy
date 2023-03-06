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
    static public function get(string $uri,callable $handler, string $name = "" ) {
        // TODO make some verification for validate uri
        array_push(self::$routes, array('uri' => $uri, 'handler' => $handler));
        // return $uri;
    }

    static public function execute() {
        $result_search = array_search($_SERVER['REQUEST_URI'], array_column(self::$routes, 'uri'));
        return self::$routes[$result_search]['handler']();
    }

    static public function run() {
        return self::$routes;
    }
}
