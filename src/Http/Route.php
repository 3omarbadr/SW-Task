<?php

namespace TestTask\Http;

use TestTask\Http\Request;
use TestTask\Http\Response;

class Route
{
    public function __construct(protected Request $request, protected Response $response){}
    
    public static array $routes = [];

    public static function get($route, $action)
    {
        self::$routes['get'][$route] = $action;
    }

    public static function post($route, $action)
    {
        self::$routes['post'][$route] = $action;
    }
}