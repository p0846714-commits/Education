<?php


require_once dirname(__DIR__)."/controller/noteController.php";

$routes =[
    '/'=>[
        'controller'=>'noteController',
        'action'=>'accueil'
    ],

    "/login"=> [
        "controller" => "authController",
        "action" => "login"
    ]
];

    $uri = parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
    $route=$routes[$uri]??$routes['/'];

    $controller=$route['controller'];
    $action=$route['action'];
    if(file_exists(dirname(__DIR__)."/controller/".$controller.".php")){
        require_once(dirname(__DIR__)."/controller/".$controller.".php");

        if(function_exists($action)){
            $action();
        }
    }
    else{
        http_response_code(404);
        echo "Page not found";
    }
    
