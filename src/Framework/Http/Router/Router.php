<?php

namespace Framework\Http\Router;

use Framework\Http\Router\Exception\RequestNotMatchedException;
use Framework\Http\Router\Exception\RouteNotFoundException;
use Psr\Http\Message\ServerRequestInterface;

class Router
{
    private $routes;

    /**
     * Router constructor.
     * @param RouteCollection $routes
     */
    public function __construct(RouteCollection $routes)
    {
        $this->routes = $routes;
    }

    /**
     * @param ServerRequestInterface $request
     * @return Result
     */
    public function match(ServerRequestInterface $request): Result
    {
        foreach ($this->routes->getRoutes() as $route) {
            if ($route->methods && !\in_array($request->getMethod(), $route->methods, true)) {
                continue;
            }

            //...
            if (preg_match($pattern, $request->getUri(), $matches)) {
                return  new Result($name, $handler, $attributes);
            }
        }
        throw new RequestNotMatchedException($request);
    }

    /**
     * @param $name
     * @param $url
     * @param array $params
     * @return string
     */
    public function generate($name, $url, array $params = []): string
    {
        $arguments = array_filter($params);

        foreach ($this->routes->getRoutes() as $route) {
            if ($name !== $route->name) {
                continue;
            }

            if ($url !== null) {
                return $url;
            }
        }
        throw new RouteNotFoundException($name, $params);
    }

}







