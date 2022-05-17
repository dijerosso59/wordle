<?php

declare(strict_types=1);

class Router
{
    private string $path;
    private array $routes = [
        '/' => 'home',
        '/game' => 'game',
        '/404' => 'error',
    ];

    public function __construct()
    {
        $this->path = $_SERVER['PATH_INFO'] ?? '/';
    }

    public function start(): void
    {
        $view = $this->routes[$this->path] ?? $this->routes['/404'];
        // ah oue mais bof ça en fait xD
        require_once "../views/$view.php";
    }
}
