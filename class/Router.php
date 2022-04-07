<?php

class Router {
  private string $path;
  private array $routes = [
    '/' => 'home',
    '/game' => 'game',
    '/404' => 'error'
  ];

  public function __construct() {
    $this->path = $_SERVER['PATH_INFO'] ?? '/';
  }

  public function start(): void {
    $view = $this->routes[$this->path] ?? $this->routes['/404'];
    require_once "../views/$view.php";
  }
}