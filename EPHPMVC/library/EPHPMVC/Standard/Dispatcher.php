<?php

namespace EPHPMVC\Standard;

use EMPHPMVC\RouterInterface,
    EMPHPMVC\RequestInterface,
    EMPHPMVC\ResponseInterface,
    EMPHPMVC\ViewInterface,
    EMPHPMVC\DispatcherInterface,

class Dispatcher implements DispatcherInterface
{
    public function dispatch(
        RouteInterface $route,
        RequestInterface $request,
        ResponseInterface $response,
        ViewInterface $view
    )
    {
        $controllerAction = $route->createActionController();
        
        if ($controllerAction->execute($request, $response, $view)) {
            $request->stopDispatching();
        }
    }
}

