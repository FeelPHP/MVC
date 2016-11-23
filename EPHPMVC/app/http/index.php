<?php

$includePath = __DIR__ . '/controllers'
             . PATH_SEPARATOR . __DIR__ . '/models'
             . PATH_SEPARATOR . __DIR__ . '/views';

set_include_path($includePath);

require_once __DIR__ . '/../autoload.php';

spl_autoload_register($autoloader);
use EPHPMVC\Standard\FrontController as StandardFrontController,
    EPHPMVC\Standard\FifoRouter as StandardFifoRouter,
    EPHPMVC\Standard\Dispatcher as StandardDispatcher,
    EPHPMVC\Standard\View as StandardView,
    EPHPMVC\HTTP\StaticPathRoute as HTTPStaticPathRoute,
    EPHPMVC\HTTP\Request as HTTPRequest,
    EPHPMVC\HTTP\Response as HTTPResponse;

//foreach (get_declared_classes() as $declaredClass) {
    //print_r($declaredClass);
    //echo "<br>";
//}

$router = new StandardFifoRouter();

$router->addRoute(new HTTPStaticPathRoute('/hello-world', 'HelloWorld'));
$router->addRoute(new HTTPStaticPathRoute('/start', 'StartGreeting'));

$dispatcher = new StandardDispatcher();

$request = new HTTPRequest(
    array(
        'GET'     => array('getKey' => 'GET VALUE'),
        'POST'    => array('postKey' => 'POST VALUE'),
        'SESSION' => array('sessionKey' => 'SESSION VALUE'),
        'COOKIE'  => array('cookieKey' => 'COOKIE VALUE'),
    ),
    'http://libenkuo.com/MVC/EPHPMVC/app/http/hello-world'
);

$response = new HTTPResponse(HTTPResponse::VERSION_11);

$view = new StandardView();
$view->setTemplate('error.php');

$view->pass('e', function($str) {
    return htmlentities($str, ENT_COMPAT, 'UTF-8');
});

$frontController = new StandardFrontController($router, $dispatcher);
$frontController->run($request, $response, $view);
