<?php

namespace EPHPMVC;

interface ActionControllerInterface
{
    public function execute(RequestInterface $request, ReponseInterface $response, ViewInterface $view);
}

