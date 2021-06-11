<?php


namespace App\Http\Controllers;

use Klein\ServiceProvider;
use Zend\Diactoros\Request;
use Zend\Diactoros\Response;

class BaseController
{
    /**
     * @var
     */
    protected $container;

    /**
     * @var
     */
    protected $request;

    /**
     * @var
     */
    protected $response;

    /**
     * @var
     */
    protected $serviceProvider;

    /**
     * @param Pimple $container
     * @return $this
     */
    public function setContainer(Pimple $container): self
    {
        $this->container = $container;
        return $this;
    }

    /**
     * @param Request $request
     * @return $this
     */
    public function setRequest(Request $request): self
    {
        $this->request = $request;
        return $this;
    }

    /**
     * @param Response $response
     * @return $this
     */
    public function setResponse(Response $response): self
    {
        $this->response = $response;
        return $this;
    }

    public function before() {

    }

    public function after() {

    }

    public function setServiceProvider(ServiceProvider $serviceProvider): self
    {
        $this->serviceProvider = $serviceProvider;
        return $this;
    }
}