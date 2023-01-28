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
?>