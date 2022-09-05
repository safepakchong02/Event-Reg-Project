<?php
date_default_timezone_set('Asia/Bangkok');

if (@$_GET['event_view'] != '') {
    $event_view = @$_GET['event_view'];
} else if (@$_POST['event_view'] != '') {
    $event_view = @$_POST['event_view'];
} else {
    $event_view = '';
}
include_once('../../../asset/config/config.php');

//******************** show data *********************//
if ($event_view == 'show_data') {

    if ($_SESSION["perm"] == "admin") {
        $sql = "SELECT * FROM events " .
            "LEFT JOIN users " .
            "ON events.ev_assign_to = users.user_id " .
            "WHERE ev_del = '0'";
    }
    else {
        $sql = "SELECT * FROM events " .
            "LEFT JOIN users " .
            "ON events.ev_assign_to = users.user_id " .
            "WHERE ev_del = '0' and ev_create_by = '". $_SESSION["user_id"] ."'";
    }

    $resource_data = mysqli_query($handle, $sql);
    $count_row = mysqli_num_rows($resource_data);

    if ($count_row > 0) {
        while ($result = mysqli_fetch_assoc($resource_data)) {
            $js["ev_id"] = $result["ev_id"];
            $js["ev_title"] = $result["ev_title"];
            $js["ev_date_start"] = $result["ev_date_start"];
            $js["ev_date_end"] = $result["ev_date_end"];
            $js["user_name"] = $result["user_name"];
            $js["user_surname"] = $result["user_surname"];

            $d_st = DateTime::createFromFormat('d/m/Y H:i', $result["ev_date_start"]);
            $d_ed = DateTime::createFromFormat('d/m/Y H:i', $result["ev_date_end"]);
            $now = new DateTime();

            if ($now >= $d_st && $now <= $d_ed) {
                $js["ev_status"] = "เปิดลงทะเบียน";
                $js["isOpen"] = "table-success";
            } else {
                $js["ev_status"] = "ปิดลงทะเบียน";
                $js["isOpen"] = "table-danger";
            }
            $rows[] = $js;
            // $rows[] = $result;
        }

        $data = json_encode($rows);
        //$totaldata = sizeof($rows);
        $results = '{"results_data":' . $data . '}';
    }
    echo $results;

    //******************** add data *********************//
} else if ($event_view == 'add') {
    $sql_add_event = "insert into events set " .
        "ev_id='" . $_POST["ev_id"] . "'," .
        "add_by='" .$SESSION['user_id'] . "'," .
        "emp_id='" . $_POST['emp_id'] . "'," .
        "card_id='" . $_POST['card_id'] . "'," .
        "name='" . $_POST['name'] . "'," .
        "call='" . $_POST["call"] . "'," .
        "com_name='" . $_POST["com_name"] . "'," .
        "dep='" . $_POST['dep'] . "'," .
        "pos='" . $_POST['pos'] . "'," .
        "salary='" . $_POST['salary'] . "'," .
        "gender='" . $_POST['gender'] . "'," .
        "age='" . $_POST["age"] . "'," .
        "birthDate='" . $_POST['birthDate'] . "'," .
        "reg_date='" . $_POST['reg_date'] . "';";

    mysqli_query($handle, $sql_add_event);
    // echo $sql_add_event;
    //******************** view Edit *********************//

} else if ($event_view == 'show_data_edit') {

    $sql = "SELECT * FROM `events`".
        " WHERE ev_id = '" . $_GET['ev_id'] . "'";
    $resource_data = mysqli_query($handle, $sql);
    $numRows = mysqli_num_fields($resource_data);
    //		$resultArray = array();

    while ($result = mysqli_fetch_assoc($resource_data)) {
        $rows[] = $result;
    }

    $data = json_encode($rows);
    $results = '{"results_data_edit":' . $data . '}';
    echo $results;

    //******************** Update Edit *********************//
} else if ($event_view == 'edit_form_save') {
    if ($_POST['ev_id'] != '') {
        $ev_id = $_POST["ev_id"];
        $id = $_POST["id"];
        $add_by = $_POST['add_by'];
        $emp_id = $_POST['emp_id'];
        $card_id = $_POST['card_id'];
        $name = $_POST['name'];
        $call = $_POST['call'];
        $com_name = $_POST['com_name'];
        $dep = $_POST['dep'];
        $pos = $_POST['pos'];
        $gender = $_POST['gender'];
        $age = $_POST['age'];
        $birthDate = $_POST['birthDate'];
        $reg_date = $_POST['reg_date'];



        $sql_update = "UPDATE `event_member` SET `ev_id` = '$ev_id'," .
            "`add_by` = '$add_by'," .
            "`emp_id` = '$emp_id'," .
            "`card_id` = '$card_id'," .
            "`name` = '$name'," .
            "`call` = '$call'," .
            "`com_name` = '$com_name'," .
            "`dep` = '$dep'," .
            "`pos` = '$pos'," .
            "`gender` = '$gender'," .
            "`age` = '$age'," .
            "`birthDate` = '$birthDate'," .
            "`reg_date` = '$reg_date'" .
            " WHERE `event_member`.`id` = '$id';";



        mysqli_query($handle, $sql_update);
        // echo $sql_update;
    }

    //******************** delete data *********************//
} else if ($event_view == 'del_event') {

    if ($_GET['id'] != '') {
        $id = $_GET['id'];
        $sql_delete_event = "UPDATE `event_member` SET `del` = '1'" .
            " WHERE `event_member`.`id` = '$id'";
        mysqli_query($handle, $sql_delete_event);
        // echo $sql_delete_event;
    }

    //******************** else *********************//
} else {
    $results = '{"results_data":null}';
    echo $results;
}


?>
<?php
