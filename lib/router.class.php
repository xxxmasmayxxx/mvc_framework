<?php


class Router
{
    protected $uri;
    protected $controller;
    protected $action;
    protected $params;
    protected $route;
    protected $methodPrefix;
    protected $language;

    public function __construct($uri)
    {
        $this->uri = urldecode(trim($uri,'/'));

        $routes = Config::get('routes');
        $this->route = Config::get('defaultRoute');
        $this->methodPrefix = $routes[$this->route] ?? null;
        $this->language = Config::get('defaultLanguage');
        $this->controller = Config::get('defaultController');
        $this->action = Config::get('defaultAction');

        $uriParts = explode('?', $this->uri);
        $path = $uriParts[0];
        $pathParts = explode('/', $path);

        if (count($pathParts))
        {
            if (in_array(strtolower(current($pathParts)), array_keys($routes)))
            {
                $this->route = strtolower(current($pathParts));
                $this->methodPrefix = $routes[$this->route] ?? null;
                array_shift($pathParts);

            } elseif (in_array(strtolower(current($pathParts)), Config::get('languages')))
            {
                $this->language = strtolower(current($pathParts));
                array_shift($pathParts);
            }
            if (current($pathParts))
            {
                $this->controller = strtolower(current($pathParts));
                array_shift($pathParts);
            }
            if (current($pathParts))
            {
                $this->action = strtolower(current($pathParts));
                array_shift($pathParts);
            }

            $this->params = $pathParts;
        }
    }

    /**
     * @return mixed
     */
    public function getRoute()
    {
        return $this->route;
    }

    /**
     * @return mixed
     */
    public function getMethodPrefix()
    {
        return $this->methodPrefix;
    }

    /**
     * @return mixed
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @return mixed
     */
    public function getUri()
    {
        return $this->uri;
    }

    /**
     * @return mixed
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * @return mixed
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @return mixed
     */
    public function getParams()
    {
        return $this->params;
    }


}