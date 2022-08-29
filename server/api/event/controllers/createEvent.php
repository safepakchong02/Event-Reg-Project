<?php //// Build api for event
//include_once('../models/createEvent.php');
//header('Content-Type: application/json; charset=utf-8');
//echo json_encode($rows);
// Create add api for event
include_once('../models/createEvent.php');
header('Content-Type: application/json; charset=utf-8');
echo json_encode($rows);
