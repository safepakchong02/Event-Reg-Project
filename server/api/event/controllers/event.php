<?php // Build api for event
include_once('../models/eventList.php');
header('Content-Type: application/json; charset=utf-8');
    echo json_encode($rows);
