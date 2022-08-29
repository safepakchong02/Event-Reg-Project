<?php
include_once('../../../../asset/config/config.php');

//$sql = "SELECT * FROM `events`";

$sql = "insert into events set
    ev_title='" . $_POST['ev_title'] . "' ,
    ev_date_start='" . $_POST['ev_date_start'] . "' ,
    ev_date_end='" . $_POST['ev_date_end'] . "' ,
    ev_assign_to='" . $_POST['ev_assign_to'] . "' ,
    ev_created_by='" . $_POST['ev_created_by'] . "' ,
    ev_table_name='" . $_POST['ev_table_name'] . "' ,
    ev_del = '" . $_POST['ev_del'] . "';";

mysqli_query($handle, $sql);
echo "";
?>


<?php
//$conn = mysqli_connect('localhost',"root","","rest_api");
//if ($_SERVER["REQUEST_METHOD"] === 'POST')
//{
//    $first_name = $_REQUEST["first_name"];
//    $last_name = $_REQUEST["last_name"];
//    $phone_no = $_REQUEST["phone_no"];
//    $query = "INSERT INTO students (`first_name`,`last_name`,`phone_no`)   VALUES('$first_name','$last_name','$phone_no')";
//    $result = $conn->query($query);
//    if ($result == 1)
//    {
//        $data["message"] = "data saved successfully";
//        $data["status"] = "Ok";
//    }
//    else
//    {
//        $data["message"] = "data not saved successfully";
//        $data["status"] = "error";
//    }
//}
//else
//{
//    $data["message"] = "Format not supported";
//    $data["status"] = "error";
//}
//echo json_encode($data);

