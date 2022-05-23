<?php

namespace Seior\PHP\Uas\Router;

use Seior\PHP\Uas\Helper\View;

class Router
{
    private static array $routes = [];

    public static function add(Method $method, string $path, string $controller, string $function, array $middlewares = []): void
    {
        self::$routes[] = [
            'method' => $method->getMethod(),
            'path' => $path,
            'controller' => $controller,
            'function' => $function,
            'middlewares' => $middlewares
        ];
    }

    public static function run(): void
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $path = $_SERVER['PATH_INFO'] ?? '/';

        foreach (self::$routes as $route) {
            $pattern = '#^' . $route['path'] . '$#';

            // call controller
            if ($route['method'] === $method && preg_match($pattern, $path, $results)) {
                // call middleware
                foreach ($route['middlewares'] as $middleware) {
                    $instance = new $middleware;
                    $instance->before();
                }

                $controller = new $route['controller'];
                $function = $route['function'];

                // delete first index in results
                array_shift($results);

                // call function with params
                call_user_func_array([$controller, $function], $results);
                return;
            }
        }

        View::redirect('/');
        http_response_code(404);
    }

}

