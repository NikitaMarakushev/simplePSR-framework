<?php

use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\JsonResponse;
use Zend\HttpHandlerRunner\Emitter\SapiEmitter;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Diactoros\ServerRequestFactory;

chdir(dirname(__DIR__));
require 'vendor/autoload.php';

//Initialize
$request = ServerRequestFactory::fromGlobals();

//Action
$path = $request->getUri()->getPath();
$action = null;

if ($path === '/') {

    $action = function (ServerRequestInterface $request) {
        $name = $request->getQueryParams()['name'] ?? 'Guest';
        $response = new HtmlResponse('Hello'. $name);
    };

} elseif ($path === '/about') {

    $action = function (ServerRequestInterface $request) {
        $name = $request->getQueryParams()['name'] ?? 'Guest';
        return new HtmlResponse('Hello' . $name);
    };

}
elseif ($path === '/blog') {
        $response = new JsonResponse([
            ['id' => 2, 'title' => 'Second page'],
            ['id' => 1, 'title' => 'First page']
        ]);
}
elseif (preg_match('#^/blog/(?P<id>\d+)$#i', $path, $matches)) {

    $request = $request->withAttribute('id', $matches['id']);

    $action = function (ServerRequestInterface $request) {
        $id = $request->getAttribute('id');
        if ($id > 2) {
            return new JsonResponse(['error' => 'Undefined page'], 404);
        }
        return new JsonResponse(['id' => $id, 'title' => 'Post: '.$id]);
    };
}

if ($action) {
    $response = $action($request);
} else {
    $response = new JsonResponse(['error' => 'Undef page'], 404);
}

//Postprocessing
$response = $response->withHeader('X-Developer', 'FrNicky');

//Sending
$emitter = new SapiEmitter();
$emitter->emit($response);