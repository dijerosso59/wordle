<?php

require_once '../class/Router.php';
require_once '../class/Word.php';
require_once '../class/Game.php';
require_once '../class/Letter.php';
require_once '../class/Cookie.php';

$router = new Router();
$router->start();

// php -S localhost:8000 -t public
?>