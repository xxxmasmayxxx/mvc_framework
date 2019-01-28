<?php


class App
{
    protected static $router;

    /**
     * @return mixed
     */
    public static function getRouter()
    {
        return self::$router;
    }

    public static function run($uri)
    {
        self::$router = new Router($uri);

        $controllerClass = ucfirst(self::$router->getController().'Controller');
        $controllerMethod = strtolower(
            self::$router->getMethodPrefix()
             .self::$router->getAction());
        $controllerObject = new $controllerClass;
        if (method_exists($controllerObject, $controllerMethod))
        {
            $result = $controllerObject->$controllerMethod();
        } else {
            throw new Exception('Method '.$controllerMethod
                .' of class '.$controllerClass.' doesn\'t exists.');
        }
    }
}