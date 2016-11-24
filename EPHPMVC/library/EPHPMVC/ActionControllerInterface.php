<?php

namespace EPHPMVC;

interface ActionControllerInterface
{
    public function execute(RequestInterface $request, ResponseInterface $response, ViewInterface $view);
}

