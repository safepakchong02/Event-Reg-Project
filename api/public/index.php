<?php
use Slim\Http\Response as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Selective\BasePath\BasePathMiddleware;
use Slim\Http\Interfaces\ResponseInterface as Rp;
use Slim\MiddlewareDispatcher as MiddlewareDispatcher;

require '../vendor/autoload.php';
require_once 'controllers/eventController.php';
require_once 'controllers/userController.php';
use controllers\EventController;
use controllers\UserController;
use ResponseObj\responseObject;
use Slim\Http\Interfaces\ResponseInterface;

$app = AppFactory::create();

$app->addRoutingMiddleware();

$app->add(new BasePathMiddleware($app));

$app->addErrorMiddleware(true, true, true);

$app->get('/', function (Request $request, Response $response) {
    $response->getBody()->write("Hello world!");
    return $response;
});

$app->post('/login', UserController::class . '::login');

$app->post('/register', UserController::class . '::register');

$app->post('/logout', UserController::class . '::logout');

$app->group('/admin', function($app) {
    $app->get('/users', UserController::class . '::getUserAdmin');
    $app->post('/logout', UserController::class . '::forceLogout');
    $app->patch('/user/role', UserController::class . '::editRole');
});

$app->group('/user', function($app) {
    $app->get('/profile', UserController::class . '::getProfile');
    $app->post('/deactivate', UserController::class . '::deactivate');
});

$app->group('/event', function($app) {
    $app->get('/', EventController::class . '::getEvent');
    $app->get('/MyEvent', EventController::class . '::getMyRegisteredEvent');
    $app->get('/ModEvent', EventController::class . '::getModEvent');
    $app->get('/{eventId}', EventController::class . '::getEventDetail');
});

$app->group('/event', function($app) {
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