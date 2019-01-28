<?php

require_once (ROOT.DS.'config'.DS.'config.php');

function __autoload($className)
{
    $className = strtolower($className);

    $libPath = ROOT.DS.'lib'.DS.$className.'.class.php';

    $controllerPath = ROOT.DS.'controllers'.DS.str_replace(
        'controller', '', $className).'.controller.php';

    $modelPath = ROOT.DS.'models'.DS.$className.'.php';

    if (file_exists($libPath))
    {
        require_once($libPath);

    } elseif (file_exists($controllerPath))
    {
        require_once($controllerPath);

    } elseif (file_exists($modelPath))
    {
        require_once($modelPath);

    } else {

        throw new Exception('Failed to include class: '.$className);
    }

}