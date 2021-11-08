<?php
require "vendor/autoload.php";
use Laminas\Diactoros\Response\HtmlResponse;
use Laminas\Diactoros\Response\JsonResponse;
use MiladRahimi\PhpRouter\Exceptions\RouteNotFoundException;
use MiladRahimi\PhpRouter\Router;

$router = Router::create();

/** Utilisation d'une fonction de cloture */
$router->get('/', function () {
    return new HtmlResponse("<h1>Bonjour Monde !</h1>");
});

/** Utilisation d'une classe contrôleur */

$router->get( '/about', [TpWeb\Controleurs\Welcome::class, 'about']);
$router->get( '/test', [TpWeb\Controleurs\Welcome::class, 'index']);
$router->get( '/personnes', [TpWeb\Controleurs\PersonnesControleur::class, 'index']);
$router->get( '/personnes/{id}', [TpWeb\Controleurs\PersonnesControleur::class, 'show']);


try {
    $router->dispatch();
} catch (RouteNotFoundException $e) {
    // Page pas trouvée
    $router->getPublisher()->publish(new HtmlResponse('Not found.', 404));
} catch (Throwable $e) {
    // Ca bug ...
    print_r($e);
    $router->getPublisher()->publish(new HtmlResponse('Internal error.', 500));
}