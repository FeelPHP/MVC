<?php

namespace EPHPMVC;

interface ResponseInterface
{
    
    public function raiseProcessingError();
    
    public function isError();
    
    public function send(ViewInterface $view);
}

