<?php

require_once __DIR__ . "/../vendor/autoload.php";
require_once __DIR__ . "/config/Connection.php";

verifType();

use App\Controller\IndexController;
use App\Router\Router;
use Symfony\Component\Dotenv\Dotenv;

$dotenv = new Dotenv();
$dotenv->loadEnv(__DIR__ . '/../.env');

$connection = new Connection();
$entityManager = $connection->getEntityManager();

$requestUri = $_SERVER['REQUEST_URI'];
$requestMethod = $_SERVER['REQUEST_METHOD'];

if ($requestUri === '/'){
    $controller = new IndexController();
    $controller->index($entityManager);
}

$router = new Router();
$router->addRoute('home' , '/contact' , 'GET' ,  IndexController::class , 'contact');
$router->addRoute('home' , '/' , 'GET' ,  IndexController::class , 'index');
$router->checkRoute($requestUri , $requestMethod);

function verifType()
{
    if (
        php_sapi_name() !== 'cli' &&
        preg_match('/\.(?:png|jpg|jpeg|gif|ico)$/', $_SERVER['REQUEST_URI'])
    ) {
        return false;
    }
    return true;
}