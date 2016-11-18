<?php

namespace EPHPMVC;

interface RouterInterface
{
    public function addRoute(RouteInterface $route);
    
    public function route(RequestInterface $request, ResponseInterface $response);
}

