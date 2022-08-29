<?php // sql
include_once('../../../../asset/config/config.php');
$id = $_POST['id'];
$sql = "UPDATE `events` SET `ev_del` = '1',".
    " WHERE `events`.`ev_id` = $id";

$result = mysqli_query($sql);
if($result){
    echo "ลบข้อมูลสำเร็จ";
}else{
    echo "ลบข้อมูลไม่สำเร็จ";
}
?>