<?php

namespace EPHPMVC\Standard;

use EPHPMVC\RouteInterface,
    EPHPMVC\RequestInterface,
    EPHPMVC\ResponseInterface,
    EPHPMVC\ViewInterface,
    EPHPMVC\DispatcherInterface;

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

