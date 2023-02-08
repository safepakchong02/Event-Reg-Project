<?php

    require_once 'connect.php';

    global $handle;
    global $returnData;

    function getEvent($param){
        try {
            $handle = connectDb();
            $handle->beginTransaction();
            $query = "SELECT * FROM eventView where " . implode(' AND ', $param). " ";
            $result = $handle->prepare($query);
            $result->execute();
            $returnData = $result->fetchAll();
            $handle->commit();
        }
        catch (PDOException $e) {
            $handle->rollback();
            return [];
        }
        return $returnData;
    }

    function genEventId() {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = 'EV';
        for ($i = 2; $i < 10; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        try {
            $handle = connectDb();
            $handle->beginTransaction();
            $query = "SELECT ev_eventId from events where ev_eventId = '{$randomString}'";
            $result = $handle->prepare($query);
            $result->execute();
            $returnData = $result->fetch();
            if (!$returnData) {
                return $randomString;
            }
            $handle->commit();
        }
        catch (PDOException $e) {
            $handle->rollback();
            echo $e->getMessage();
            return 500;
        }
        return genEventId();
    }


    function checkManager($eventId){
        try {
            $handle = connectDb();
            $handle->beginTransaction();
            $query = "SELECT * FROM eventPermView WHERE ev_createdBy = '{$eventId}' OR u_userId = '{$eventId}' LIMIT 1";
            $result = $handle->prepare($query);
            $result->execute();
            $returnData = $result->fetch();
            $handle->commit();
        }
        catch (PDOException $e) {
            $handle->rollback();
            return [];
        }
        return $returnData;
    }

    function addEventRole ($eventId, $user, $r) {
        try {
            $handle = connectDb();
            $handle->beginTransaction();
            $query = "CALL addEventRole('{$eventId}', '{$user}', '{$r}' )";
            $result = $handle->prepare($query);
            $result->execute();
            $handle->commit();
        }
        catch (PDOException $e) {
            $handle->rollback();
            return 500;
        }
        return 200;
    }

    function deleteEventRole ($eventId, $user) {
        try {
            $handle = connectDb();
            $handle->beginTransaction();
            $query = "CALL deleteEventRole('{$eventId}', '{$user}')";
            $result = $handle->prepare($query);
            $result->execute();
            $handle->commit();
        }
        catch (PDOException $e) {
            $handle->rollback();
            return 500;
        }
        return 200;
    }
    
    function checkEventOwner($eventId){
        try {
            $handle = connectDb();
            $handle->beginTransaction();
            $query = "SELECT * FROM eventPermView WHERE ev_createdBy = '{$eventId}'  LIMIT 1";
            $result = $handle->prepare($query);
            $result->execute();
            $returnData = $result->fetch();
            if (!$returnData) {
                return false;
            }
            $handle->commit();
        }
        catch (PDOException $e) {
            $handle->rollback();
            return [];
        }
        return true;
    }

    function getEventReportAmount($data, $filter){
        try {
            $handle = connectDb();
            $handle->beginTransaction();
            $query = "SELECT " . implode(', ', $filter). ", count(*) as count FROM eventReportView where  " . implode(' AND ', $data). " GROUP BY " . implode(', ', $filter). "";
            $result = $handle->prepare($query);
            $result->execute();
            $returnData = $result->fetchAll();
            $handle->commit();
        }
        catch (PDOException $e) {
            $handle->rollback();
            return [];
        }
        return $returnData;
    }

    function getEventReport($eventId){
        try {
            $handle = connectDb();
            $handle->beginTransaction();
            $query = "SELECT * FROM eventReport WHERE ev_eventId = '{$eventId}'";
            $result = $handle->prepare($query);
            $result->execute();
            $returnData = $result->fetchAll();
            $handle->commit();
        }
        catch (PDOException $e) {
            $handle->rollback();
            return [];
        }
        return $returnData;
    }
    function createEvent($data) {
        $returnData = null;
        try {
            $data['ev_title'] = array_key_exists("ev_title", $data) ? $data['ev_title'] : null;
            $data['ev_detail'] = array_key_exists("ev_detail", $data) ? $data['ev_detail'] : null;
            $data['ev_limit'] = array_key_exists("ev_limit", $data) ? $data['ev_limit'] : null;
            $data['ev_dType'] = array_key_exists("ev_dType", $data) ? $data['ev_dType'] : null;
            $data['ev_selfReg'] = array_key_exists("ev_selfReg", $data) ? $data['ev_selfReg'] : null;
            $data['ev_public'] = array_key_exists("ev_public", $data) ? $data['ev_public'] : null;
            $data['ev_preReg'] = array_key_exists("ev_preReg", $data) ? $data['ev_preReg'] : null;
            $data['ev_gps'] = array_key_exists("ev_gps", $data) ? $data['ev_gps'] : 0;
            $data['ev_lat'] = array_key_exists("ev_lat", $data) ? $data['ev_lat'] : 0.0;
            $data['ev_long'] = array_key_exists("ev_long", $data) ? $data['ev_long'] : 0.0;
            $data['ev_preRegStart'] = array_key_exists("ev_preRegStart", $data) ? $data['ev_preRegStart'] : null;
            $data['ev_preRegEnd'] = array_key_exists("ev_preRegEnd", $data) ? $data['ev_preRegEnd'] : null;
            $data['ev_checkInStart'] = array_key_exists("ev_checkInStart", $data) ? $data['ev_checkInStart'] : null;
            $data['ev_checkInEnd'] = array_key_exists("ev_checkInEnd", $data) ? $data['ev_checkInEnd'] : null;
            $data['ev_eventStart'] = array_key_exists("ev_eventStart", $data) ? $data['ev_eventStart'] : null;
            $data['ev_eventEnd'] = array_key_exists("ev_eventEnd", $data) ? $data['ev_eventEnd'] : null;
            $handle = connectDb();
            $handle->beginTransaction();
            $query = "CALL createEvent( '{$data['ev_userId']}' , '{$data['ev_eventId']}',
            '{$data['ev_title']}', 
            '{$data['ev_detail']}', '{$data['ev_limit']}', 
            '{$data['ev_dType']}', '{$data['ev_selfReg']}', '{$data['ev_public']}',
            '{$data['ev_preReg']}', '{$data['ev_gps']}',
            '{$data['ev_lat']}', '{$data['ev_long']}', 
            '{$data['ev_preRegStart']}', '{$data['ev_preRegEnd']}', 
            '{$data['ev_checkInStart']}', '{$data['ev_checkInEnd']}', 
            '{$data['ev_eventStart']}', '{$data['ev_eventEnd']}')";
            echo $query;

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

    function eventDetail($eventId){
        try {
            $handle = connectDb();
            $handle->beginTransaction();
            $query = "SELECT * FROM eventView where ev_eventId = '{$eventId}'";

            $result = $handle->prepare($query);
            $result->execute();

            $rs = $result->fetchAll();

            $handle->commit();
        }
        catch (PDOException $e) {
            $handle->rollback();
            return 500;
        }
        return $rs;
    }

    function eventPermission($eventId){
        try {
            $handle = connectDb();
            $handle->beginTransaction();
            $query = "SELECT * FROM eventPermView where ev_eventId = '{$eventId}'";

            $result = $handle->prepare($query);
            $result->execute();

            $rs = $result->fetchAll();
            $handle->commit();
        }
        catch (PDOException $e) {
            $handle->rollback();
            return 500;
        }
        return $rs;
    }

    function eventMember($eventId){
        try {
            $handle = connectDb();
            $handle->beginTransaction();
            $query = "SELECT * FROM eventMemberView where ev_eventId = '{$eventId}'";

            $result = $handle->prepare($query);
            $result->execute();

            $rs = $result->fetchAll();

            $handle->commit();
        }
        catch (PDOException $e) {
            $handle->rollback();
            return 500;
        }
        return $rs;
    }

    function updateEvent($data, $eventId) {

        $data['ev_title'] = array_key_exists("ev_title", $data) ? $data['ev_title'] : null;
        $data['ev_detail'] = array_key_exists("ev_detail", $data) ? $data['ev_detail'] : null;
        $data['ev_limit'] = array_key_exists("ev_limit", $data) ? $data['ev_limit'] : null;
        $data['ev_dType'] = array_key_exists("ev_dType", $data) ? $data['ev_dType'] : null;
        $data['ev_selfReg'] = array_key_exists("ev_selfReg", $data) ? $data['ev_selfReg'] : null;
        $data['ev_public'] = array_key_exists("ev_public", $data) ? $data['ev_public'] : null;
        $data['ev_preReg'] = array_key_exists("ev_preReg", $data) ? $data['ev_preReg'] : null;
        $data['ev_gps'] = array_key_exists("ev_gps", $data) ? $data['ev_gps'] : 0;
        $data['ev_lat'] = array_key_exists("ev_lat", $data) ? $data['ev_lat'] : 0.0;
        $data['ev_long'] = array_key_exists("ev_long", $data) ? $data['ev_long'] : 0.0;
        $data['ev_preRegStart'] = array_key_exists("ev_preRegStart", $data) ? $data['ev_preRegStart'] : null;
        $data['ev_preRegEnd'] = array_key_exists("ev_preRegEnd", $data) ? $data['ev_preRegEnd'] : null;
        $data['ev_checkInStart'] = array_key_exists("ev_checkInStart", $data) ? $data['ev_checkInStart'] : null;
        $data['ev_checkInEnd'] = array_key_exists("ev_checkInEnd", $data) ? $data['ev_checkInEnd'] : null;
        $data['ev_eventStart'] = array_key_exists("ev_eventStart", $data) ? $data['ev_eventStart'] : null;
        $data['ev_eventEnd'] = array_key_exists("ev_eventEnd", $data) ? $data['ev_eventEnd'] : null;

        
        $returnData = null;
        try {
            $handle = connectDb();
            $handle->beginTransaction();
            $query = "CALL updateEvent( '{$data['u_userId']}' , '{$eventId}',
            '{$data['ev_title']}', 
            '{$data['ev_detail']}', '{$data['ev_limit']}', 
            '{$data['ev_dType']}', '{$data['ev_selfReg']}', '{$data['ev_public']}',
            '{$data['ev_preReg']}', '{$data['ev_gps']}',
            '{$data['ev_lat']}', '{$data['ev_long']}', 
            '{$data['ev_preRegStart']}', '{$data['ev_preRegEnd']}', 
            '{$data['ev_checkInStart']}', '{$data['ev_checkInEnd']}', 
            '{$data['ev_eventStart']}', '{$data['ev_eventEnd']}')";
            $result = $handle->prepare($query);
            $result->execute();
            $af = $result->rowCount();
            if ($af === 0){
                return 500;
            }
            $handle->commit();
        }
        catch (PDOException $e) {
            $handle->rollback();
            echo $e->getMessage();
            return 500;
        }
        
        return 200;
    }

    function deleteEvent($eventId, $userId) {
        $returnData = null;
        try {
            $handle = connectDb();
            $handle->beginTransaction();
            $query = "CALL deleteEvent('{$userId}', '{$eventId}')";

            $result = $handle->prepare($query);
            $result->execute();
            $handle->commit();
        }
        catch (PDOException $e) {
            $handle->rollback();
            echo $e->getMessage();
            return 500;
        }
        return 200;
    }

    function preRegister ($eventId, $userId) {
        try {
            $handle = connectDb();
            $handle->beginTransaction();
            $query = "CALL preRegister('{$userId}', '{$eventId}')";

            $result = $handle->prepare($query);
            $result->execute();
            $handle->commit();
        }
        catch (PDOException $e) {
            $handle->rollback();
            return 500;
        }
        return 200;
    } 

    function checkIn ($eventId, $userId) {
        try {
            $handle = connectDb();
            $handle->beginTransaction();
            $query = "CALL checkIn('{$userId}', '{$eventId}')";

            $result = $handle->prepare($query);
            $result->execute();
            $handle->commit();
        }
        catch (PDOException $e) {
            $handle->rollback();
            return 500;
        }
        return 200;
    }
    
    function getMyRegisteredEvent($userId) {
        try {
            $handle = connectDb();
            $handle->beginTransaction();
            $query = "SELECT * FROM 
            eventView as e 
            LEFT JOIN eventMemberView as m ON e.ev_eventId = m.ev_eventId
            WHERE m.u_userId = '{$userId}'
            ORDER BY e.ev_status = 1";
            $result = $handle->prepare($query);
            $result->execute();
            $returnData = $result->fetchAll();
            $handle->commit();
        }
        catch (PDOException $e) {
            $handle->rollback();
            return 500;
        }
        return $returnData;
    }
    function getModEvent($userId) {
        try {
            $handle = connectDb();
            $handle->beginTransaction();
            $query = "SELECT * FROM 
            eventView as e 
            WHERE e.ev_createdBy = '{$userId}'
            ORDER BY e.ev_createdBy";
            $result = $handle->prepare($query);
            $result->execute();
            $returnData = $result->fetchAll();
            $handle->commit();
        }
        catch (PDOException $e) {
            $handle->rollback();
            return 500;
        }
        return $returnData;
    }

?>