<?php

namespace EPHPMVC\HTTP;

use EPHPMVC\Standard\AbstractRequest;

class Request extends AbstractRequest
{
    protected $_uri;
    protected $_scheme;
    protected $_host;
    protected $_user;
    protected $_pass;
    protected $_path;
    protected $_query;
    
    public function __construct(array $params, $uri)
    {
        
        parent::__construct($params);
        $this->_uri = $uri;
        $this->_scheme = parse_url($uri, PHP_URL_SCHEME);
        $this->_host = parse_url($uri, PHP_URL_HOST);
        $this->_port = parse_url($uri, PHP_URL_PORT);
        $this->_user = parse_url($uri, PHP_URL_USER);
        $this->_pass = parse_url($uri, PHP_URL_PASS);
        $this->_path = parse_url($uri, PHP_URL_PATH);
        $this->_query = parse_url($uri, PHP_URL_QUERY);
    }
    
    public function getUri()
    {
        return $this->_uri;
    }
    
    public function getScheme()
    {
        return $this->_scheme;
    }
    
    public function getHost()
    {
        return $this->_host;
    }
    
    public function getPort()
    {
        return $this->_port;
    }
    
    public function getUser()
    {
        return $this->_user;
    }
    
    public function getPath()
    {
        return $this->_path;
    }
    
    public function getQuery()
    {
        return $this->_query;
    }
    
    public function isSecure()
    {
        return $this->getScheme() === 'https';
    }
}

