<?php

namespace Kurama\Core\Library;

use DI\Container;
use Kurama\Controllers\NotFoundController;
use Kurama\Core\Exceptions\ControllerNotFoundException;

class Router
{
    protected array $routes = [];
    protected ?string $controller = null;
    protected string $action;
    protected array $parameters = [];

    public function __construct(
        private Container $container
    ) {}

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
            return $this->handleController();
        }

        return $this->handleNotFound();
    }


    /**
     * Handles the execution of a controller and action, passing any route parameters as arguments.
     *
     * @param string $controller The name of the controller class to instantiate.
     * @param string $action The method within the controller class to call.
     * @param array $parameters An array of route parameters to pass as arguments to the controller method.
     *
     * @return mixed The result of calling the controller method with the given arguments.
     */
    private function handleController() {
        if (!class_exists($this->controller) || !method_exists($this->controller, $this->action)) {
            throw new ControllerNotFoundException("[$this->controller::$this->action] does not exist");
        }

        $controller = $this->container->get($this->controller);
        $this->container->call([$controller, $this->action], [...$this->parameters]);
    }

    /**
     * Handles the "not found" scenario by setting an HTTP response code of 500 and returning a "Not Found" message.
     *
     * @return void
     */
    private function handleNotFound()
    {
        http_response_code(404);
        header('Location: /404');
    }
}
