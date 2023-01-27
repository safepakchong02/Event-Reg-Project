<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Selective\BasePath\BasePathMiddleware;

require '../vendor/autoload.php';
require_once 'controllers/eventController.php';
use controllers\EventController;

$app = AppFactory::create();

$app->addRoutingMiddleware();

$app->add(new BasePathMiddleware($app));

$app->addErrorMiddleware(true, true, true);

$app->get('/', function (Request $request, Response $response, $args) {
    var_dump(class_exists('controllers\EventController'));
    $response->getBody()->write("Hello world!");
    return $response;
});

$app->get('/event/getEvent', EventController::class . '::test');

$app->run();
?>