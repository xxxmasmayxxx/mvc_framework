<?php

define ('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(dirname(__FILE__)));

require_once (ROOT.DS.'lib'.DS.'init.php');

try {
    App::run($_SERVER['REQUEST_URI']);
} catch (Exception $e)
{
    echo 'Выброшено исключение: ',  $e->getMessage();
    echo "<br><a href='/'>Go to Homepage</a>";
}