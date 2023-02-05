<?php
use Slim\Http\Response as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Selective\BasePath\BasePathMiddleware;

require '../vendor/autoload.php';
require_once 'controllers/eventController.php';
require_once 'controllers/userController.php';
use controllers\EventController;
use controllers\UserController;

$app = AppFactory::create();

$app->addRoutingMiddleware();

$app->add(new BasePathMiddleware($app));

$app->addErrorMiddleware(true, true, true);

$app->get('/', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Hello world!");
    return $response;
});

$app->post('/login', UserController::class . '::login');

$app->post('/register', UserController::class . '::register');

$app->group('/event', function($app) {
    $app->get('/', EventController::class . '::getEvent');
    $app->get('/{eventId}', EventController::class . '::getEventDetail');
    $app->get('/{eventId}/member', EventController::class . '::getEventMember');
    $app->get('/{eventId}/permission', EventController::class . '::getEventPermission');
    $app->post('/', EventController::class . '::createEvent');
    $app->patch('/{eventId}', EventController::class . '::editEvent');
    $app->delete('/{eventId}', EventController::class . '::deleteEvent');    
    $app->patch('/{eventId}/preRegister', EventController::class . '::preRegister');
    $app->patch('/{eventId}/checkIn', EventController::class . '::checkIn');
});


$app->run();
?>