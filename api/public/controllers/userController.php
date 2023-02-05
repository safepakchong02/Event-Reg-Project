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
    require_once '../public/db/userDb.php';

    Class UserController
    {
        public static function login(Request $request, Response $response, $args) {
            try {
                $body = $request->getParsedBody();
                if (!$body) {
                    $return = new responseObject(400, "Missing or incorrect parameters", null);
                    return $response->withStatus(400)->withJson($return->getResponse());
                }
                $email = array_key_exists("u_email", $body) ? $body['u_email'] : null;
                $password = array_key_exists("u_password", $body) ? md5($body['u_password']) : null;
                if (!$email || !$password) {
                    $return = new responseObject(400, "Missing or incorrect parameters", null);
                    return $response->withStatus(400)->withJson($return->getResponse());
                }
                $result = login($email, $password);
                if ($result === 500) {
                    $return = new responseObject(500, "Error", "");
                    return $response->withStatus(500)->withJson($return->getResponse());
                }
                else {
                    $return = new responseObject(200, "Success", $result['ac_token']);
                    setcookie('token', $result['ac_token'], time() + 86400);
                    setcookie('userId', $result['u_userId'], time() + 86400);
                    setcookie('role', $result['u_role'], time() + 86400);
                    setcookie('name', $result['u_name'], time() + 86400);
                }
                return $response->withStatus(200)->withJson($return->getResponse());
            }
            catch (Exception $e) {
                $return = new responseObject(500, "Error", $e->getMessage());
                return $response->withStatus(500)->withJson($return->getResponse());
            }
        }
        public static function register(Request $request, Response $response, $args) {
            try {
                $body = $request->getParsedBody();
                if (!$body) {
                    $return = new responseObject(400, "Missing or incorrect parameters", null);
                    return $response->withStatus(400)->withJson($return->getResponse());
                }
                if (!$body['u_email'] || !$body['u_password']) {
                    $return = new responseObject(400, "Missing or incorrect parameters", null);
                    return $response->withStatus(400)->withJson($return->getResponse());
                }
                $email = checkEmail($body['u_email']);
                if ($email) {
                    $return = new responseObject(400, "Email already exist", null);
                    return $response->withStatus(400)->withJson($return->getResponse());
                }
                $result = register($body);
                if ($result === 500) {
                    $return = new responseObject(500, "Error", "");
                }
                else {
                    $return = new responseObject(201, "Success", "");
                }
                return $response->withStatus($result)->withJson($return->getResponse());
            }
            catch (Exception $e) {
                $return = new responseObject(500, "Error", $e->getMessage());
                return $response->withStatus(500)->withJson($return->getResponse());
            }
        }

        public static function logout(Request $request, Response $response, $args) {
            try {
                $header = getallheaders();
                $token = $header["Authorization"];
                $result = logout($token);
                if ($result === 500) {
                    $return = new responseObject(500, "Error", "");
                    return $response->withStatus(500)->withJson($return->getResponse());
                }
                else {
                    $return = new responseObject(200, "Success", '');
                    setcookie('token', '', time() - 86400);
                    setcookie('userId', '', time() - 86400);
                    setcookie('role', '', time() - 86400);
                    setcookie('name', '', time() - 86400);
                }
                return $response->withStatus(200)->withJson($return->getResponse());
            }
            catch (Exception $e) {
                $return = new responseObject(500, "Error", $e->getMessage());
                return $response->withStatus(500)->withJson($return->getResponse());
            }
        }
    }


?>