<?php

namespace Core\Kernel;

use Core\Environment\DotEnv;
use Core\Http\Request;
use Core\Routing\Route;
use Core\Routing\Router;
use Core\Session\Session;

class Kernel
{

    public static function run()
    {
        Session::start();



        $router = new Router();



        $process = $router->handleRequest(new Request());


        self::trigger($process);






        $dotEnv = new Dotenv();

        $landingController =$dotEnv->getVariable('LANDING_CONTROLLER');
        $landingMethod =$dotEnv->getVariable('LANDING_METHOD');



//        $type = $landingController;
//        $action = $landingMethod;
//        if(!empty($_GET['type'])){ $type = $_GET['type']; }
//        if(!empty($_GET['action'])){ $action = $_GET['action']; }
//
//
//        $type = ucfirst($type); // Article
//        $controllerName = "App\Controller\\".$type."Controller";
//
//        $controller = new $controllerName();
//        $controller->$action();
    }

    public static function trigger(Process $process)
    {
        $type = $process->getController();
        $action = $process->getAction();

        var_dump($type);
//
//        $type = ucfirst($type); // Article
//        $controllerName = "App\Controller\\".$type."Controller";

        $controller = new $type();
        return $controller->$action();
    }


}