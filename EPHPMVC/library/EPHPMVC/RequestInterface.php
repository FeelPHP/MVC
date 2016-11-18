<?php

namespace EPHPMVC;

interface RequestInterface
{
    
    public function isDispatched();
    
    public function dispatchAgain();
    
    public function stopDispatching();
    
    public function getParam($namespace = null, $key = null, $default = null);
}

