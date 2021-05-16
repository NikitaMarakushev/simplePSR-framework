<?php

namespace Framework\Http\Router;

class Route
{
    public $name;
    public $pattern;
    public $handler;
    public $tokens;
    public $methods;

    /**
     * Route constructor.
     * @param $name
     * @param $pattern
     * @param $handler
     * @param array $methods
     * @param array $tokens
     */
    public function __construct($name, $pattern, $handler, array $methods, array $tokens = [])
    {
        $this->name = $name;
        $this->pattern = $pattern;
        $this->handler = $handler;
        $this->methods = $methods;
        $this->tokens = $tokens;
    }
}