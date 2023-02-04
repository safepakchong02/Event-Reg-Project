<?php

    require_once 'connect.php';

    global $handle;
    global $returnData;
    function createEvent($data) {
        $returnData = null;
        try {
            $handle = connectDb();
            $handle->beginTransaction();
            $query = "CALL createEvent( '{$data['userId']}' , '{$data['eventId']}',
            '{$data['title']}', 
            '{$data['detail']}', '{$data['limit']}', 
            '{$data['dType']}', '{$data['selfReg']}', '{$data['public']}',
            '{$data['preReg']}', '{$data['gps']}',
            '{$data['lat']}', '{$data['long']}', 
            '{$data['preRegStart']}', '{$data['preRegEnd']}', 
            '{$data['checkInStart']}', '{$data['checkInEnd']}', 
            '{$data['eventStart']}', '{$data['eventEnd']}')";

            $result = $handle->prepare($query);
            $result->execute();
            $handle->commit();
        }
        catch (PDOException $e) {
            $handle->rollback();
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

        $data['title'] = array_key_exists("title", $data) ? $data['title'] : null;
        $data['detail'] = array_key_exists("detail", $data) ? $data['detail'] : null;
        $data['dType'] = array_key_exists("dType", $data) ? $data['dType'] : null;
        $data['selfReg'] = array_key_exists("selfReg", $data) ? $data['selfReg'] : null;
        $data['public'] = array_key_exists("public", $data) ? $data['public'] : null;
        $data['preReg'] = array_key_exists("preReg", $data) ? $data['preReg'] : null;
        $data['gps'] = array_key_exists("gps", $data) ? $data['gps'] : null;
        $data['lat'] = array_key_exists("lat", $data) ? $data['lat'] : null;
        $data['long'] = array_key_exists("long", $data) ? $data['long'] : null;
        $data['preRegStart'] = array_key_exists("preRegStart", $data) ? $data['preRegStart'] : null;
        $data['preRegEnd'] = array_key_exists("preRegEnd", $data) ? $data['preRegEnd'] : null;
        $data['checkInStart'] = array_key_exists("checkInStart", $data) ? $data['checkInStart'] : null;
        $data['checkInEnd'] = array_key_exists("checkInEnd", $data) ? $data['checkInEnd'] : null;
        $data['eventStart'] = array_key_exists("eventStart", $data) ? $data['eventStart'] : null;
        $data['eventEnd'] = array_key_exists("eventEnd", $data) ? $data['eventEnd'] : null;
        $data['status'] = array_key_exists("status", $data) ? $data['status'] : null;

        
        $returnData = null;
        try {
            $handle = connectDb();
            $handle->beginTransaction();
            $query = "CALL updateEvent( '{$data['userId']}' , '{$eventId}',
            '{$data['title']}', 
            '{$data['detail']}', '{$data['limit']}', 
            '{$data['dType']}', '{$data['selfReg']}', '{$data['public']}',
            '{$data['preReg']}', '{$data['gps']}',
            '{$data['lat']}', '{$data['long']}', 
            '{$data['preRegStart']}', '{$data['preRegEnd']}', 
            '{$data['checkInStart']}', '{$data['checkInEnd']}', 
            '{$data['eventStart']}', '{$data['eventEnd']}', '{$data['status']}')";
            echo $query;
            echo json_encode($data);
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

?>