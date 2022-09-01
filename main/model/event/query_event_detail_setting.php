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

        $sql = "SELECT * FROM ";

        $resource_data = mysqli_query($handle, $sql);
        $count_row = mysqli_num_rows($resource_data);

        if ($count_row > 0) {
            while ($result = mysqli_fetch_assoc($resource_data)) {
                $js["ev_id"] = $result["ev_id"];
                $js["walk_in"] = $result["walk_in"];

              if ($result["รหัสพนักงาน"] == '1') $js["รหัสพนักงาน"] = true;
              else $js["รหัสพนักงาน"] = false;
                if ($result["รหัสบัตรประชาชน	"] == '1') $js["รหัสบัตรประชาชน	"] = true;
                else $js["รหัสบัตรประชาชน	"] = false;
                if ($result["ชื่อ-สกุล	"] == '1') $js["ชื่อ-สกุล	"] = true;
                else $js["ชื่อ-สกุล"] = false;
                if ($result["เบอร์โทรศัพท์	"] == '1') $js["เบอร์โทรศัพท์	"] = true;
                else $js["เบอร์โทรศัพท์	"] = false;
                if ($result["ชื่อบริษัท"] == '1') $js["ชื่อบริษัท"] = true;
                else $js["ชื่อบริษัท"] = false;
                if ($result["เงินเดือน"] == '1') $js["เงินเดือน"] = true;
                else $js["เงินเดือน"] = false;
                if ($result["เพศ"] == '1') $js["เพศ"] = true;
                else $js["เพศ"] = false;
                if ($result["อายุ"] == '1') $js["อายุ"] = true;
                else $js["อายุ"] = false;
                if ($result["วันเดือนปีเกิด"] == '1') $js["วันเดือนปีเกิด"] = true;
                else $js["วันเดือนปีเกิด"] = false;




                $rows[] = $result;
            }

            $data = json_encode($rows);
            //$totaldata = sizeof($rows);
            $results = '{"results_data":' . $data . '}';
        }
        echo $results;

        //******************** edit data *********************//
    } else if ($event_view == 'edit_form_save') {
        if ($_POST['ev_id'] != '') {
            $ev_id = $_POST["ev_id"];
            $ev_title = $_POST['ev_title'];
            $ev_date_start = $_POST['ev_date_start'];
            $ev_date_end = $_POST['ev_date_end'];
            $ev_assign_to = $_POST['ev_assign_to'];


            $sql_update = "UPDATE `events` SET `ev_title` = '$ev_title'," .
                " `ev_assign_to` = '$ev_assign_to'," .
                " `ev_date_start` = '$ev_date_start'," .
                " `ev_date_end` = '$ev_date_end'" .
                " WHERE `ev_id` = '$ev_id'";
            mysqli_query($handle, $sql_update);
            // echo $sql_update;
        }
    } else {
        $results = '{"results_data":null}';
        echo $results;
    }
?>
