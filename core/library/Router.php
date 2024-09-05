<?php

namespace Kurama\Core\library;

use Exception;
use Kurama\Core\Exceptions\ControllerNotFoundException;

class Router
{
    protected array $routes = [];
    protected ?string $controller = null;
    protected string $action;
    protected array $parameters = [];

    /**
     * Adds a new route to the router.
     *
     * @param string $method The HTTP request method (e.g. GET, POST, PUT, DELETE).
     * @param string $uri The URI of the route.
     * @param array $route The route data.
     * @return void
     */
    public function add(
        string $method,
        string $uri,
        array $route
    ) {
        $this->routes[$method][$uri] = $route;
    }

    /**
     * Executes the router by iterating over the registered routes and handling the URI for the current request method.
     *
     * @return mixed The result of handling the URI for the current request method.
     */    public function execute()
    {
        foreach ($this->routes as $request => $routes) {
            if ($request === REQUEST_METHOD) {
                return $this->handleUri($routes);
            }
        }
    }

    /**
     * Handles the URI for the current request by iterating over the registered routes and executing the corresponding controller and action.
     *
     * @param array $routes An array of routes where the key is the URI and the value is an array containing the controller and action.
     * @return mixed The result of handling the URI, either by executing the controller and action or by handling a not found scenario.
     */
    private function handleUri(array $routes)
    {
        foreach ($routes as $uri => $route) {
            if ($uri === REQUEST_URI) {
                [$this->controller, $this->action] = $route;
                break;
            }

            $pattern = str_replace('/', '\/', trim($uri, '/'));
            if ($uri !== '/' && preg_match("/^$pattern$/", trim(REQUEST_URI, '/'), $this->parameters)) {
                [$this->controller, $this->action] = $route;
                //Retira o primeiro elemento do array/url que não vai ser usado
                unset($this->parameters[0]);
                break;
            }
        }

        if ($this->controller) {
            return $this->handleController(
                $this->controller,
                $this->action,
                $this->parameters
            );
        }

        return $this->handleNotFound();
    }

    private function handleController(
        string $controller,
        string $action,
        array $parameters
    ) {
        if (!class_exists($controller) || !method_exists($controller, $action)) {
            throw new ControllerNotFoundException("[$controller::$action] does not exist");
        }
        $controller = new $controller;
        $controller->$action(...$parameters);
    }
    private function handleNotFound()
    {
        http_response_code(500);
        echo 'Not Found';
    }
}
