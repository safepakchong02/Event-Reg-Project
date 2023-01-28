<?php
use Slim\Http\Response as Response;
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

$app->group('/event', function($app) {
    $app->get('/', EventController::class . '::getEvent');
    $app->post('/', EventController::class . '::createEvent');
    $app->patch('/{eventId}', EventController::class . '::editEvent');
    $app->delete('/{eventId}', EventController::class . '::deleteEvent');
});

$app->run();
?>