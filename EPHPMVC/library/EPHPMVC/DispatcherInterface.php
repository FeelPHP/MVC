<?php

namespace EPHPMVC;

interface DispatcherInterface
{
    
    public function dispatch(
        RouteInterface $route,
        RequestInterface $request,
        ResponseInterface $response,
        ViewInterface $view
    );
    
}

