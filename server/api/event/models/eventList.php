<?php
include_once('../../../../asset/config/config.php');

$sql = "SELECT * FROM `events`";
$resource_data = mysqli_query($conn, $sql);
$count_row = mysqli_num_rows($resource_data);

$rows= [];
if ($count_row > 0) {
    while ($result = mysqli_fetch_assoc($resource_data)) {
        $rows[] = $result;
    }

//    $data = json_encode($rows);
//    //$totaldata = sizeof($rows);
//    $results = '{"results_data":' . $data . '}';
}
//echo $results;
