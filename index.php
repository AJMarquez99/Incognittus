<?php
define("BASE_DIR", getcwd());
require_once(BASE_DIR . "/classes/Router.class.php");
$router = new Router( $_SERVER["REQUEST_URI"] );
$router->exec();
