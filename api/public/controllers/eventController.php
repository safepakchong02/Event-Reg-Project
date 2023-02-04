<?php
    namespace controllers;
    use Psr\Container\ContainerInterface;
    use Slim\Http\Response as Response;
    use Psr\Http\Message\ServerRequestInterface as Request;
    use Psy\Util\Json;
    use ResponseObj\responseObject;
    use eventDb;
    use TheSeer\Tokenizer\Exception;
    require_once 'responseObject.php';
    require_once '../public/db/eventDb.php';

    Class EventController
    {
        public static function getEvent(Request $request, Response $response, $args) {
            if (getenv('db_select')){
                echo "h";
            }
            else{
                echo "No";
            }
            $response->getBody()->write("hello");
            return $response;
        }

        public static function getEventDetail(Request $request, Response $response, $args) {
            try {
                $eventId = $args['eventId'];
                $return = new responseObject(0, null, null);
                $result = eventDetail($eventId);
                if (!$result) {
                    $return = new responseObject(500, "Error", "");
                }
                else {
                    $return = new responseObject(201, "Created Success", $result);
                }
                return $response->withStatus(200)->withJson($return->getResponse());
            }
            catch (Exception $e) {
                $return = new responseObject(500, "Error", $e->getMessage());
                return $response->withStatus(500)->withJson($return->getResponse());
            }
        }

        public static function createEvent(Request $request, Response $response, $args) {
            try {
                $body = $request->getParsedBody();
                $return = new responseObject(0, null, null);
                if (!$body) {
                    $return = new responseObject(400, "Bad request", null);
                    return $response->withStatus(400)->withJson($return->getResponse());
                }
                $result = createEvent($body);
                if ($result !== 201) {
                    $return = new responseObject(500, "Error", "");
                }
                else {
                    $return = new responseObject(201, "Created Success", "");
                }
                return $response->withStatus($result)->withJson($return->getResponse());
            }
            catch (Exception $e) {
                $return = new responseObject(500, "Error", $e->getMessage());
                return $response->withStatus(500)->withJson($return->getResponse());
            }
        }

        public static function editEvent(Request $request, Response $response, $args) {
            try {
                $body = $request->getParsedBody();
                $return = new responseObject(0, null, null);
                if (!$body || !$args['eventId']) {
                    $return = new responseObject(400, "Bad request", null);
                    return $response->withStatus(400)->withJson($return->getResponse());
                }
                $result = updateEvent($body, $args['eventId']);
                if ($result !== 200) {
                    $return = new responseObject(500, "Error", "");
                }
                else {
                    $return = new responseObject(200, "Updated Success", "");
                }
                return $response->withStatus($result)->withJson($return->getResponse());
            }
            catch (Exception $e) {
                $return = new responseObject(500, "Error", $e->getMessage());
                return $response->withStatus(500)->withJson($return->getResponse());
            }
        }

        public static function deleteEvent(Request $request, Response $response, $args) {
            try{
                $body = $request->getParsedBody();
                if (!$body) {
                    $return = new responseObject(400, "Bad request", null);
                    return $response->withStatus(400)->withJson($return->getResponse());
                }
                $eventId = array_key_exists("eventId", $args) ? $args['eventId'] : null;
                $userId = array_key_exists("userId", $body) ? $body['userId'] : null;
                if (!$eventId|| !$userId) {
                    $return = new responseObject(400, "Bad request", null);
                    return $response->withStatus(400)->withJson($return->getResponse());
                }
                $result = deleteEvent($eventId, $userId);
                if ($result !== 200) {
                    $return = new responseObject(500, "Error", "");
                }
                else {
                    $return = new responseObject(200, "Updated Success", "");
                }
                return $response->withStatus($result)->withJson($return->getResponse());
            }
            catch (Exception $e) {
                $return = new responseObject(500, "Error", $e->getMessage());
                return $response->withStatus($result)->withJson($return->getResponse());
            }
        }

        public static function preRegister(Request $request, Response $response, $args) {
            try {
                $body = $request->getParsedBody();
                if (!$body) {
                    $return = new responseObject(400, "Bad request", null);
                    return $response->withStatus(400)->withJson($return->getResponse());
                }
                $eventId = array_key_exists("eventId", $args) ? $args['eventId'] : null;
                $userId = array_key_exists("userId", $body) ? $body['userId'] : null;
                if (!$eventId|| !$userId) {
                    $return = new responseObject(400, "Bad request", null);
                    return $response->withStatus(400)->withJson($return->getResponse());
                }
                $result = preRegister($eventId, $userId);
                if ($result !== 200) {
                    $return = new responseObject(500, "Error", "");
                }
                else {
                    $return = new responseObject(200, "Updated Success", "");
                }
                return $response->withStatus($result)->withJson($return->getResponse());
            }
            catch (Exception $e) {
                $return = new responseObject(500, "Error", $e->getMessage());
                return $response->withStatus(500)->withJson($return->getResponse());
            }
        }

        public static function checkIn(Request $request, Response $response, $args) {
            try {
                $body = $request->getParsedBody();
                if (!$body) {
                    $return = new responseObject(400, "Bad request", null);
                    return $response->withStatus(400)->withJson($return->getResponse());
                }
                $eventId = array_key_exists("eventId", $args) ? $args['eventId'] : null;
                $userId = array_key_exists("userId", $body) ? $body['userId'] : null;
                if (!$eventId|| !$userId) {
                    $return = new responseObject(400, "Bad request", null);
                    return $response->withStatus(400)->withJson($return->getResponse());
                }
                $result = checkIn($eventId, $userId);
                if ($result !== 200) {
                    $return = new responseObject(500, "Error", "");
                }
                else {
                    $return = new responseObject(200, "Updated Success", "");
                }
                return $response->withStatus($result)->withJson($return->getResponse());
            }
            catch (Exception $e) {
                $return = new responseObject(500, "Error", $e->getMessage());
                return $response->withStatus(500)->withJson($return->getResponse());
            }
        }
    }


?>