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
    require_once '../public/db/userDb.php';

    Class EventController
    {
        public static function getEvent(Request $request, Response $response, $args) {
            try {
                $auth = authen($request->getHeaders());
                $role = array_key_exists('u_role', (array)$auth) ? $auth['u_role'] : null;
                $param = $request->getQueryParams();
                $c = array();
                foreach ($param as $key=>$val) {
                    if ($key === 'ev_title') {
                        $c[] = "ev_title LIKE '%$val%'";
                    }
                    if ($key === 'ev_eventId') {
                        $c[] = "ev_eventId = '$val'";
                    }
                }
                $c[] = "ev_status = 1";
                $c[] = "ev_public = 1";
                $result = getEvent($c);
                $return = new responseObject(200, "Success", $result);
                return $response->withStatus(200)->withJson($return->getResponse());
            }
            catch (Exception $e) {
                $return = new responseObject(500, "Error", $e->getMessage());
                return $response->withStatus(500)->withJson($return->getResponse());
            }
        }

        public static function getEventReport(Request $request, Response $response, $args) {
            try {
                $eventId =  $args['eventId'];
                $result = getEventReport($eventId);
                $return = new responseObject(200, "Success", $result);
                return $response->withStatus(200)->withJson($return->getResponse());
            }
            catch (Exception $e) {
                $return = new responseObject(500, "Error", $e->getMessage());
                return $response->withStatus(500)->withJson($return->getResponse());
            }
        }

        public static function getEventReportAmount(Request $request, Response $response, $args) {
            try {
                $auth = authen($request->getHeaders());
                $userId = array_key_exists('u_userId', (array)$auth) ? $auth['u_userId'] : null;
                $idcheck = checkManager($userId);
                if (!array_key_exists('u_userId', (array)$idcheck)){
                    $return = new responseObject(500, "Error", null);
                    return $response->withStatus(500)->withJson($return->getResponse());
                }
                $param = $request->getQueryParams();
                $c = array();
                $b = null;
                $c[] = "ev_eventId = '{$args['eventId']}'";
                foreach ($param as $key=>$val) {
                    if ($key === 'year') {
                        $c[] = "year = $val%";
                    }
                    if ($key === 'month') {
                        $c[] = "month = $val%";
                    }
                    if ($key === 'day') {
                        $c[] = "month = $val%";
                    }
                    if ($key === 'filter') {
                        $b = $val;
                    }
                }
                $result = getEventReportAmount($c, $b);
                $return = new responseObject(200, "Success", $result);
                return $response->withStatus(200)->withJson($return->getResponse());
            }
            catch (Exception $e) {
                $return = new responseObject(500, "Error", $e->getMessage());
                return $response->withStatus(500)->withJson($return->getResponse());
            }
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

        public static function getEventMember(Request $request, Response $response, $args) {
            try {
                $eventId = $args['eventId'];
                $return = new responseObject(0, null, null);
                $result = eventMember($eventId);
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

        public static function getEventPermission(Request $request, Response $response, $args) {
            try {
                $eventId = $args['eventId'];
                $return = new responseObject(0, null, null);
                $result = eventPermission($eventId);
                if (!$result) {
                    $return = new responseObject(404, "Not Found", "");
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
                $auth = authen($request->getHeaders());
                $userId = array_key_exists('u_userId', (array)$auth) ? $auth['u_userId'] : null;
                if (!$userId) {
                    $return = new responseObject(500, "Error", "");
                    return $response->withStatus(500)->withJson($return->getResponse());
                }
                $body = $request->getParsedBody();
                $return = new responseObject(0, null, null);
                if (!$body) {
                    $return = new responseObject(400, "Bad request", null);
                    return $response->withStatus(400)->withJson($return->getResponse());
                }
                $body['ev_eventId'] = (string)genEventId();
                $body['ev_userId'] = $userId;
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
                $auth = authen($request->getHeaders());
                $userId = array_key_exists('u_userId', (array)$auth) ? $auth['u_userId'] : null;
                if (!$userId) {
                    $return = new responseObject(500, "Error", "");
                    return $response->withStatus(500)->withJson($return->getResponse());
                }
                $body = $request->getParsedBody();
                $return = new responseObject(0, null, null);
                if (!$body || !$args['eventId']) {
                    $return = new responseObject(400, "Bad request", null);
                    return $response->withStatus(400)->withJson($return->getResponse());
                }
                if (!array_key_exists('u_userId', $body)) {
                    $return = new responseObject(400, "Bad request", null);
                    return $response->withStatus(400)->withJson($return->getResponse());
                }
                if ($userId != $body['userId']){
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
                if (!$userId) {
                    $return = new responseObject(500, "Error", "");
                    return $response->withStatus(500)->withJson($return->getResponse());
                }
                $eventId = array_key_exists("eventId", $args) ? $args['eventId'] : null;
                $userId = array_key_exists('u_userId', (array)$body) ? $body['u_userId'] : null;
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
                $auth = authen($request->getHeaders());
                $userId = array_key_exists('u_userId', (array)$auth) ? $auth['u_userId'] : null;
                if (!$userId) {
                    $return = new responseObject(500, "Error", "");
                    return $response->withStatus(500)->withJson($return->getResponse());
                }
                $eventId = array_key_exists("eventId", $args) ? $args['eventId'] : null;
                if (!$eventId|| !$userId) {
                    $return = new responseObject(400, "Bad request", null);
                    return $response->withStatus(400)->withJson($return->getResponse());
                }
                $result = preRegister($eventId, $userId);
                if ($result === 500) {
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
                $auth = authen($request->getHeaders());
                $userId = array_key_exists('u_userId', (array)$auth) ? $auth['u_userId'] : null;
                if (!$userId) {
                    $return = new responseObject(500, "Error", "");
                    return $response->withStatus(500)->withJson($return->getResponse());
                }
                $eventId = array_key_exists("eventId", $args) ? $args['eventId'] : null;
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


        public static function getMyRegisteredEvent(Request $request, Response $response, $args) {
            try {
                $auth = authen($request->getHeaders());
                $userId = array_key_exists('u_userId', (array)$auth) ? $auth['u_userId'] : null;
                if (!$userId) {
                    $return = new responseObject(500, "Error", "");
                    return $response->withStatus(500)->withJson($return->getResponse());
                }

                $result = getMyRegisteredEvent($userId);
                $return = new responseObject(200, "Success", $result);
                return $response->withStatus(200)->withJson($return->getResponse());
            }
            catch (Exception $e) {
                $return = new responseObject(500, "Error", $e->getMessage());
                return $response->withStatus(500)->withJson($return->getResponse());
            }
        }

        public static function getModEvent(Request $request, Response $response, $args) {
            try {
                $auth = authen($request->getHeaders());
                $userId = array_key_exists('u_userId', (array)$auth) ? $auth['u_userId'] : null;
                if (!$userId) {
                    $return = new responseObject(500, "Error", "");
                    return $response->withStatus(500)->withJson($return->getResponse());
                }
 
                $result = getModEvent($userId);
                $return = new responseObject(200, "Success", $result);
                return $response->withStatus(200)->withJson($return->getResponse());
            }
            catch (Exception $e) {
                $return = new responseObject(500, "Error", $e->getMessage());
                return $response->withStatus(500)->withJson($return->getResponse());
            }
        }

        public static function addEventRole(Request $request, Response $response, $args) {
            try {
                $auth = authen($request->getHeaders());
                $userId = array_key_exists('u_userId', (array)$auth) ? $auth['u_userId'] : null;
                $idcheck = checkManager($userId);
                $role = array_key_exists('p_role', (array)$idcheck) ? $idcheck['p_role'] : null;
                if (!checkEventOwner($userId) && (!array_key_exists('u_userId', (array)$idcheck) || $role != 1 )){
                    $return = new responseObject(500, "Error", null);
                    return $response->withStatus(500)->withJson($return->getResponse());
                }
                $body = $request->getParsedBody();
                $user = array_key_exists('u_userId', (array)$body) ? $body['u_userId'] : null;
                $r = array_key_exists('p_role', (array)$body) ? $body['p_role'] : null;
                $eventId = $args['eventId'];
                if (!$body || !$user || !$r) {
                    $return = new responseObject(500, "Error", "");
                    return $response->withStatus(500)->withJson($return->getResponse());
                }
                $result = addEventRole($eventId, $user, $r);
                if ($result === 500) {
                    $return = new responseObject(500, "Error", "");
                    return $response->withStatus(500)->withJson($return->getResponse());
                }
                $return = new responseObject(200, "Success", "");
                return $response->withStatus(200)->withJson($return->getResponse());
            }
            catch (Exception $e) {
                $return = new responseObject(500, "Error", $e->getMessage());
                return $response->withStatus(500)->withJson($return->getResponse());
            }
        }

        public static function deleteEventRole(Request $request, Response $response, $args) {
            try {
                $auth = authen($request->getHeaders());
                $userId = array_key_exists('u_userId', (array)$auth) ? $auth['u_userId'] : null;
                $idcheck = checkManager($userId);
                $role = array_key_exists('p_role', (array)$idcheck) ? $idcheck['p_role'] : null;
                if (!checkEventOwner($userId) && (!array_key_exists('u_userId', (array)$idcheck) || $role != 1 )){
                    $return = new responseObject(500, "Error", null);
                    return $response->withStatus(500)->withJson($return->getResponse());
                }
                $body = $request->getParsedBody();
                $user = array_key_exists('u_userId', (array)$body) ? $body['u_userId'] : null;
                $eventId = $args['eventId'];
                if (!$body || !$user) {
                    $return = new responseObject(500, "Error", "");
                    return $response->withStatus(500)->withJson($return->getResponse());
                }
                $result = deleteEventRole($eventId, $user);
                if ($result === 500) {
                    $return = new responseObject(500, "Error", "");
                    return $response->withStatus(500)->withJson($return->getResponse());
                }
                $return = new responseObject(200, "Success", "");
                return $response->withStatus(200)->withJson($return->getResponse());
            }
            catch (Exception $e) {
                $return = new responseObject(500, "Error", $e->getMessage());
                return $response->withStatus(500)->withJson($return->getResponse());
            }
        }

    }


?>