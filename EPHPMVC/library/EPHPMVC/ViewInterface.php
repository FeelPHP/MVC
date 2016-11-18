<?php

namespace EPHPMVC;

interface ViewInterface
{
    
    public function render();
    
    public function pass($name, $value = null);
    
    public function setTemplate($template);
}
