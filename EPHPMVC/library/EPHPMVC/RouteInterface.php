<?php

namespace EPHPMVC;

interface RouteInterface
{
    
   public function matches(RequestInterface $request); 
    
   public function createActionController();
}

