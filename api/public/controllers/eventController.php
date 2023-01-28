<?php
    namespace controllers;
    use Psr\Container\ContainerInterface;
    use Slim\Http\Response as Response;
    use Psr\Http\Message\ServerRequestInterface as Request;
    use Psy\Util\Json;
    use ResponseObj\responseObject;
    use eventDb;
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

        public static function createEvent(Request $request, Response $response, $args) {
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

        public static function editEvent(Request $request, Response $response, $args) {
            $response->getBody()->write("Hello world2!");
            return $response;
        }

        public static function deleteEvent(Request $request, Response $response, $args) {
            $response->getBody()->write("Hello world2!");
            return $response;
        }
    }


?>