<?php

define ('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(dirname(__FILE__)));

require_once (ROOT.DS.'lib'.DS.'init.php');

$router = new Router($_SERVER['REQUEST_URI']);
//echo "<pre>";
print_r('Route: '.$router->getRoute()."<br>");
print_r('Lang: '.$router->getLanguage()."<br>");
print_r( 'Controller:'.$router->getController()."<br>");
print_r( 'Action: '.$router->getMethodPrefix());
print_r( $router->getAction()."<br>");
echo 'Params: '; print_r( $router->getParams());
