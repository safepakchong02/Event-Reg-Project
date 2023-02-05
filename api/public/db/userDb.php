<?php

    require_once 'connect.php';

    global $handle;
    global $returnData;
    function login($email, $password) {
        $returnData = null;
        try {
            $handle = connectDb();
            $handle->beginTransaction();
            $query = "SELECT * FROM users WHERE u_email = '{$email}' AND u_password = '{$password}'";

            $result = $handle->prepare($query);
            $result->execute();
            $rs = $result->fetch();
            if ($rs) {
                $userId = $rs['u_userId'];
                $query1 = "CALL clearToken('{$userId}')";
                $query2 = "SELECT ac_token, u_userId, u_role, CONCAT(ud_firstName, ' ', ud_lastName) as 'u_name' from userView where u_userId = '{$userId}'";
                $rs1 = $handle->prepare($query1);
                $rs1->execute();
                $rs2 = $handle->prepare($query2);
                $rs2->execute();
                if ($rs2) {
                    $returnData = $rs2->fetch();
                }
                else {
                    return 500;
                }           
            }
            else {
                return 500;
            }
            $handle->commit();
        }
        catch (PDOException $e) {
            $handle->rollback();
            echo $e->getMessage();
            return 500;
        }
        return $returnData;
    }

    function checkEmail($email) {
        try {
            $handle = connectDb();
            $handle->beginTransaction();
            $query = "SELECT * FROM userView WHERE u_email = '{$email}'";
            $result = $handle->prepare($query);
            $result->execute();
            $rs = $result->fetch();
            if ($rs) {
                return true;
            }
            $handle->commit();
        }
        catch (PDOException $e) {
            $handle->rollback();
            return 500;
        }
        return false;
    }

    function register($data){
        $data['u_password'] = md5($data['u_password']);
        $data['ud_emp_id'] = array_key_exists("ud_emp_id", $data) ? $data['ud_emp_id'] : null;
        $data['ud_card_id'] = array_key_exists("ud_card_id", $data) ? $data['ud_card_id'] : null;
        $data['ud_prefix'] = array_key_exists("ud_prefix", $data) ? $data['ud_prefix'] : null;
        $data['ud_firstName'] = array_key_exists("ud_firstName", $data) ? $data['ud_firstName'] : null;
        $data['ud_lastName'] = array_key_exists("ud_lastName", $data) ? $data['ud_lastName'] : null;
        $data['ud_gender'] = array_key_exists("ud_gender", $data) ? $data['ud_gender'] : null;
        $data['ud_birthDate'] = array_key_exists("ud_birthDate", $data) ? $data['ud_birthDate'] : null;
        $data['ud_phone'] = array_key_exists("ud_phone", $data) ? $data['ud_phone'] : null;
        $data['ud_orgName'] = array_key_exists("ud_orgName", $data) ? $data['ud_orgName'] : null;
        $data['ud_department'] = array_key_exists("ud_department", $data) ? $data['ud_department'] : null;
        $data['ud_position'] = array_key_exists("ud_position", $data) ? $data['ud_position'] : null;

        try {
            $handle = connectDb();
            $handle->beginTransaction();
            $query = null;
            if ($data['ud_birthDate']) {
                $query = "INSERT INTO users (u_userId, u_email, u_password, u_role, u_createdDate, u_status
                , ud_emp_id, ud_card_id, ud_prefix, ud_firstName, ud_lastName, ud_gender, ud_birthDate
                , ud_phone, ud_orgName, ud_department, ud_position)
                VALUES(UUID(), '{$data['u_email']}', '{$data['u_password']}', 0, NOW()
                , 'A', '{$data['ud_emp_id']}', '{$data['ud_card_id']}', '{$data['ud_prefix']}'
                , '{$data['ud_firstName']}', '{$data['ud_lastName']}', '{$data['ud_gender']}'
                , '{$data['ud_birthDate']}', '{$data['ud_phone']}', '{$data['ud_orgName']}'
                , '{$data['ud_department']}', '{$data['ud_position']}')";
            }
            else {
                $query = "INSERT INTO users (u_userId, u_email, u_password, u_role, u_createdDate, u_status
                , ud_emp_id, ud_card_id, ud_prefix, ud_firstName, ud_lastName, ud_gender
                , ud_phone, ud_orgName, ud_department, ud_position)
                VALUES(UUID(), '{$data['u_email']}', '{$data['u_password']}', 0, NOW()
                , 'A', '{$data['ud_emp_id']}', '{$data['ud_card_id']}', '{$data['ud_prefix']}'
                , '{$data['ud_firstName']}', '{$data['ud_lastName']}', '{$data['ud_gender']}'
                , '{$data['ud_phone']}', '{$data['ud_orgName']}'
                , '{$data['ud_department']}', '{$data['ud_position']}')";
            }
            

            $result = $handle->prepare($query);
            $result->execute();
            $handle->commit();
        }
        catch (PDOException $e) {
            $handle->rollback();
            echo $e->getMessage();
            return 500;
        }
        return 201;
    }

?>