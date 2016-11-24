<?php

namespace EPHPMVC\Standard;

use EPHPMVC\RouterInterface,
    EPHPMVC\DispatcherInterface,
    EPHPMVC\RequestInterface,
    EPHPMVC\ResponseInterface,
    EPHPMVC\ViewInterface;

class FrontController
{
    protected $_router;
    protected $_dispatcher;
    
    public function __construct(RouterInterface $router, DispatcherInterface $dispatcher)
    {
        $this->_router = $router;
        $this->_dispatcher = $dispatcher;
    }
    
    public function run(RequestInterface $request, ResponseInterface $response, ViewInterface $view)
    {
        $route = $this->_router->route($request, $response);
        
        while (!$response->isError() and !$request->isDispatched()) {
            $this->_dispatcher->dispatch($route, $request, $response, $view);
        }
        $response->send($view);
    }
}

