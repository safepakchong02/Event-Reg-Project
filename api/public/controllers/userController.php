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

        public static function getAdminReport(Request $request, Response $response, $args) {
            try {
                $auth = authen($request->getHeaders());
                $userId = array_key_exists('u_userId', (array)$auth) ? $auth['u_userId'] : null;
                $role = array_key_exists('u_role', (array)$auth) ? $auth['u_role'] : -1;
                if (!$userId || $role != 3) {
                    $return = new responseObject(401, "Permission invalid", "");
                    return $response->withStatus(401)->withJson($return->getResponse());
                }
                $result = getAdminReport();
                $return = new responseObject(200, "Success",  $result);
                return $response->withStatus(200)->withJson($return->getResponse());
            }
            catch (Exception $e) {
                $return = new responseObject(500, "Error", $e->getMessage());
                return $response->withStatus(500)->withJson($return->getResponse());
            }
        }

        public static function changePassword(Request $request, Response $response, $args) {
            try {
                $auth = authen($request->getHeaders());
                $userId = array_key_exists('u_userId', (array)$auth) ? $auth['u_userId'] : null;
                $role = array_key_exists('u_role', (array)$auth) ? $auth['u_role'] : -1;
                if (!$userId || $role != 3) {
                    $return = new responseObject(401, "Permission invalid", "");
                    return $response->withStatus(401)->withJson($return->getResponse());
                }
                $body = $request->getParsedBody();
                $oldpassword = array_key_exists('u_oldpassword', $body) ? $body['u_oldpassword'] : null;
                $newpassword = array_key_exists('u_newpassword', $body) ? $body['u_newpassword'] : null;
                if (!$oldpassword || !$newpassword) {
                    $return = new responseObject(400, "Bad request", "");
                    return $response->withStatus(400)->withJson($return->getResponse());
                }
                $result = changepassword($userId,$oldpassword, $newpassword);
                if ($result === 500) {
                    $return = new responseObject(500, "Error", "");
                    return $response->withStatus(500)->withJson($return->getResponse());
                }
                if ($result === 404) {
                    $return = new responseObject(404, "User not found or incorrect password", "");
                    return $response->withStatus(404)->withJson($return->getResponse());
                }
                $return = new responseObject(200, "Success", "");
                return $response->withStatus(200)->withJson($return->getResponse());
            }
            catch (Exception $e) {
                $return = new responseObject(500, "Error", $e->getMessage());
                return $response->withStatus(500)->withJson($return->getResponse());
            }
        }

        public static function resetpassword(Request $request, Response $response, $args) {
            try {
                $auth = authen($request->getHeaders());
                $role = array_key_exists('u_role', (array)$auth) ? $auth['u_role'] : -1;
                if ($role != 3) {
                    $return = new responseObject(401, "Permission invalid", "");
                    return $response->withStatus(401)->withJson($return->getResponse());
                }
                $body = $request->getParsedBody();
                $userId = array_key_exists('u_userId', $body) ? $body['u_userId'] : null;
                $password = array_key_exists('u_password', $body) ? $body['u_userId'] : null;
                if (!$userId || !$password) {
                    $return = new responseObject(400, "Bad request", "");
                    return $response->withStatus(400)->withJson($return->getResponse());
                }
                $result = resetpassword($userId, $password);
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
                    setcookie('ac_token', $result['ac_token'], time() + 86400, "/");
                    setcookie('u_userId', $result['u_userId'], time() + 86400, "/");
                    setcookie('u_role', $result['u_role'], time() + 86400, "/");
                    setcookie('ud_name', $result['u_name'], time() + 86400, "/");
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

        public static function forceLogout(Request $request, Response $response, $args) {
            try {
                $auth = authen($request->getHeaders());
                $role = array_key_exists('u_role', (array)$auth) ? $auth['u_role'] : -1;
                if ($role == -1 || $role != 3) {
                    $return = new responseObject(500, "Error", "");
                    return $response->withStatus(500)->withJson($return->getResponse());
                }
                $body = $request->getParsedBody();
                $userId = array_key_exists('u_userId', $body) ? $body['u_userId'] : null;
                if (!$userId) {
                    $return = new responseObject(500, "Error", "");
                    return $response->withStatus(500)->withJson($return->getResponse());
                }
                $result = forcelogout($userId);
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

        public static function getUserAdmin(Request $request, Response $response, $args) {
            try {
                $auth = authen($request->getHeaders());
                $role = array_key_exists('u_role', (array)$auth) ? $auth['u_role'] : -1;
                if ($role == -1 || $role != 3) {
                    $return = new responseObject(500, "Error", "");
                    return $response->withStatus(500)->withJson($return->getResponse());
                }
                $result = getUserAdmin();
                $return = new responseObject(200, "Success", $result);
                return $response->withStatus(200)->withJson($return->getResponse());
            }
            catch (Exception $e) {
                $return = new responseObject(500, "Error", $e->getMessage());
                return $response->withStatus(500)->withJson($return->getResponse());
            }
        }

        public static function editRole(Request $request, Response $response, $args) {
            try {
                $auth = authen($request->getHeaders());
                $role = array_key_exists('u_role', (array)$auth) ? $auth['u_role'] : -1;
                if ($role == -1 || $role != 3) {
                    $return = new responseObject(500, "Error", "");
                    return $response->withStatus(500)->withJson($return->getResponse());
                }
                $body = $request->getParsedBody();
                $userId = array_key_exists('u_userId', (array)$body) ? $body['u_userId'] : null;
                $userRole = array_key_exists('u_role', (array)$body) ? $body['u_role'] : -1; 
                if (!$userId || $userRole == -1) {
                    $return = new responseObject(400, "Bad request", "");
                    return $response->withStatus(400)->withJson($return->getResponse());
                }
                $result = editRole($userId, $userRole);
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

        public static function getProfile(Request $request, Response $response, $args) {
            try {
                $auth = authen($request->getHeaders());
                $userId = array_key_exists('u_userId', (array)$auth) ? $auth['u_userId'] : null;
                if (!$userId) {
                    $return = new responseObject(500, "Error", "");
                    return $response->withStatus(500)->withJson($return->getResponse());
                }
                $result = getProfile($userId);
                if ($result === 500) {
                    $return = new responseObject(500, "Error", "");
                    return $response->withStatus(500)->withJson($return->getResponse());
                }
                $return = new responseObject(200, "Success", $result);
                return $response->withStatus(200)->withJson($return->getResponse());
            }
            catch (Exception $e) {
                $return = new responseObject(500, "Error", $e->getMessage());
                return $response->withStatus(500)->withJson($return->getResponse());
            }
        }

        public static function deactivate(Request $request, Response $response, $args) {
            try {
                $auth = authen($request->getHeaders());
                $userId = array_key_exists('u_userId', (array)$auth) ? $auth['u_userId'] : null;
                $role = array_key_exists('u_role', (array)$auth) ? $auth['u_role'] : -1;
                if (!$userId) {
                    $return = new responseObject(500, "Error", "");
                    return $response->withStatus(500)->withJson($return->getResponse());
                }
                $body = $request->getParsedBody();
                $param = array_key_exists('u_userId', (array)$body) ? $body['u_userId'] : null;
                if (!$param) {
                    $return = new responseObject(500, "Error", "");
                    return $response->withStatus(500)->withJson($return->getResponse());
                }
                if ($param != $userId) {
                    if ($role != 3) {
                        $return = new responseObject(500, "Error", "");
                        return $response->withStatus(500)->withJson($return->getResponse()); 
                    }
                }
                $result = deactivate($param);
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

        public static function editProfile (Request $request, Response $response, $args) {
            try {
                $auth = authen($request->getHeaders());
                $userId = array_key_exists('u_userId', (array)$auth) ? $auth['u_userId'] : null;
                $role = array_key_exists('u_role', (array)$auth) ? $auth['u_role'] : -1;
                if (!$userId) {
                    $return = new responseObject(500, "Error", "");
                    return $response->withStatus(500)->withJson($return->getResponse());
                }
                $body = $request->getParsedBody();
                $param = array_key_exists('u_userId', (array)$body) ? $body['u_userId'] : null;
                if (!$param) {
                    $return = new responseObject(500, "Missing or incorrect parameter", "");
                    return $response->withStatus(500)->withJson($return->getResponse());
                }
                if ($param != $userId) {
                    $return = new responseObject(500, "Missing or incorrect parameter", "");
                    return $response->withStatus(500)->withJson($return->getResponse()); 
                }
                $result = editProfile($body);
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
