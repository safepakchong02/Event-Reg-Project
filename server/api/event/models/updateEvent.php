<?php // sql update api
include_once('../../../../asset/config/config.php');


    $ev_id = $_POST["ev_id"];
    $ev_title = $_POST['ev_title'];
    $ev_date_start = $_POST['ev_date_start'];
    $ev_date_end = $_POST['ev_date_end'];
    $ev_assign_to = $_POST['ev_assign_to'];
    $ev_table_name = $_POST['ev_table_name'];
    $ev_del = $_POST['ev_del'];


    $sql = "UPDATE `events` SET `ev_title` = '$ev_title',".
        " `ev_assign_to` = '$ev_assign_to',".
        " `ev_date_start` = '$ev_date_start',".
        " `ev_date_end` = '$ev_date_end'".
        " WHERE `events`.`ev_id` = $ev_id";

    if($result){
    echo "แก้ไขข้อมูลสำเร็จ";
}else{
    echo "แก้ไขข้อมูลไม่สำเร็จ";
}
?>

