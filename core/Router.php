<?php
declare(strict_types=1);

namespace Core;

class Router
{
    private array $routes = [];

    public function get(string $path, string $controller, string $method): void
    {
        $this->routes['GET'][$path] = [$controller, $method];
    }

    public function post(string $path, string $controller, string $method): void
    {
        $this->routes['POST'][$path] = [$controller, $method];
    }

    public function dispatch(): void
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $uri    = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        if (isset($this->routes[$method][$uri])) {
            [$controllerClass, $action] = $this->routes[$method][$uri];

            $fullClass = "App\\Controllers\\$controllerClass";

            if (!class_exists($fullClass)) {
                http_response_code(500);
                die("Controller não encontrado: $fullClass");
            }

            $controller = new $fullClass();

            if (!method_exists($controller, $action)) {
                http_response_code(500);
                die("Método não encontrado: $action");
            }

            $controller->$action();
        } else {
            http_response_code(404);
            require_once __DIR__ . '/../app/Views/errors/404.php';
        }
    }
}
