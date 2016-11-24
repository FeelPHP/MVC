<?php
/************************************************
 * IChing
 * Created by Liyang on 2016-11-24
 * Copyright © 2016年 Liyang. All rights reserved
 ************************************************/

use EPHPMVC\ActionControllerInterface,
    EPHPMVC\RequestInterface,
    EPHPMVC\ResponseInterface,
    EPHPMVC\ViewInterface;

class IChing implements ActionControllerInterface
{

    public $hexagramArr = array();
    public  $hexagramCount = 0;
    
    function __construct()
    {
        $this->hexagramArr = include '/var/www/html/MVC/EPHPMVC/app/http/config/IChing.php';
    }    
    
    
    private function divine()
    {
        $hexagramNo = null;
        
        for ($index = 0; $index < 6; $index++) {
            $randNo = rand(0, 1);
            $hexagramNo .= $randNo;
        }

        return $hexagramNo;
    }
    
    
    public function getHexagram()
    {
        $hexagram = $this->hexagramArr[$this->divine()];
        return "伏羲六十四卦之".$hexagram;
    }

    public function execute(RequestInterface $request, ResponseInterface $response, ViewInterface $view)
    {
        var_dump($this->divine());
        var_dump($this->getHexagram());
        
        $view->setTemplate('hello-world.php');
        
        return true;
    }
    

}

