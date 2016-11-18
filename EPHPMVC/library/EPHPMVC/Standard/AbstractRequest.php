<?php

namespace EPHPMVC\Standard;

use EPHPMVC\RequestInterface;

abstract AbstractRequest implements RequestInterface
{
    protected $_params = array();
    
    public function __construct(array $params = array())
    {
        $this->_params = $params;
    }
    
    protected $_dispatched = false;
    
    public function isDispatched()
    {
        return $this->_dispatched;
    }
    
    public function dispatchAgain()
    {
        $this->_dispatched = false;
        return $this;
    }
    
    public function stopDispatching()
    {
        $this->_dispatched = true;
        
        return $this;
    }
    
    public function getParam($namespace = null, $key = null, $default = null)
    {
        if ($namespace === null) {
            return $this->_params;
        }
        
        if (!isset($this->_params[$namespace])) {
            return $default;
        }
        
        if ($key === null) {
            return $this->_params[$namespace];
        }
        
        if (!isset($this->_params[$namespace][$key])) {
            return $default;
        }
        
        return $this->_params[$namespace][$key];
    }
}

