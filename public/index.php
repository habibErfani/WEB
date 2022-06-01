<?php

declare(strict_types=1);

include '../vendor/autoload.php';

use App\Controllers\ItemPostController;
use App\Controllers\ItemsController;

use Doctrine\DBAL\DriverManager;
use Laminas\Diactoros\ResponseFactory;
use Laminas\Diactoros\ServerRequestFactory;
use League\Route\Router;
use League\Route\Strategy\JsonStrategy;
use Laminas\HttpHandlerRunner\Emitter\SapiEmitter;
use App\Controllers\Home;
use Laminas\ServiceManager\ServiceManager;
use Middlewares\JsonPayload;

$container = new ServiceManager();
$container->setFactory(
    'db_connection',
    function () {
        $dbParams = array(
            'user' => 'root',
            'password' => '123',
            'dbname' => 'exo',
            'host' => 'localhost',
            'driver' => 'pdo_mysql',
    );
    return DriverManager::getConnection($dbParams);
}); 

$request = ServerRequestFactory::fromGlobals(
    $_SERVER,
    $_GET,
    $_POST,
    $_COOKIE,
    $_FILES
);
$responseFactory = new ResponseFactory();

$strategy = new JsonStrategy(
    $responseFactory
);

$router =new Router();

$router->setStrategy($strategy);
$router->middleware(
    new JsonPayload()
);
$router->middleware(
    new \App\Controllers\SecurityKeyMiddleware()
);
$router ->get(
    '/',
    [
        Home::class,
        'home'
    ]
);
$router ->get(
    '/items',
    [
        new ItemsController(
            $container->get(
                'db_connection'
            )
        ),
        'items'
    ]
);
$router ->post(
    '/items',
    [
        new ItemPostController(
            $container->get(
                'db_connection'
            )
        ),
        'ajoutItems'
    ]
);
$router ->delete(
    '/items/{Id}',
    [
        new ItemsController(
            $container->get(
                'db_connection'
            )
        ),
        'delete'
    ]
);

$response = $router->dispatch(
    $request
);
(new SapiEmitter())->emit(
    $response
);
