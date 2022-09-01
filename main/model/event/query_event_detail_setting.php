 <?php
    function covertBoolean($bool) {
        if ($bool == "true") return "1";
        else return "0";
    }
    
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
        $ev_id = $_GET["ev_id"];
        $sql = "SELECT * FROM event_setting WHERE ev_id = '$ev_id'";

        $resource_data = mysqli_query($handle, $sql);
        $count_row = mysqli_num_rows($resource_data);

        if ($count_row > 0) {
            while ($result = mysqli_fetch_assoc($resource_data)) {
<<<<<<< HEAD
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
=======
                foreach($result as $key => $val) {
                    switch($key) {
                        case "ev_id":
                            $js[$key] = $result[$key];
                            break;
                        default :
                            if($val == "1") $js[$key] = true;
                            else $js[$key] = false;
                    } // end switch
                } // end foreach

                $rows[] = $js;
            } // end while
>>>>>>> main

            $data = json_encode($rows);
            //$totaldata = sizeof($rows);
            $results = '{"results_data":' . $data . '}';
        }
        echo $results;

        //******************** edit data *********************//
    } else if ($event_view == 'edit_form_save') {
        if ($_POST['ev_id'] != '') {
            $ev_id = $_POST["ev_id"];
            $walk_in = covertBoolean($_POST["walk_in"]);
            $emp_id = covertBoolean($_POST["emp_id"]);
            $card_id = covertBoolean($_POST["card_id"]);
            $name = covertBoolean($_POST["name"]);
            $call = covertBoolean($_POST["call"]);
            $com_name = covertBoolean($_POST["com_name"]);
            $dep = covertBoolean($_POST["dep"]);
            $pos = covertBoolean($_POST["pos"]);
            $salary = covertBoolean($_POST["salary"]);
            $gender = covertBoolean($_POST["gender"]);
            $age = covertBoolean($_POST["age"]);
            $birthDate = covertBoolean($_POST["birthDate"]);

            $sql_update = "UPDATE `event_setting` SET " .
                "`walk_in` = '$walk_in'," .
                "`emp_id` = '$emp_id'," .
                "`card_id` = '$card_id'," .
                "`name` = '$name'," .
                "`call` = '$call'," .
                "`com_name` = '$com_name'," .
                "`dep` = '$dep'," .
                "`pos` = '$pos'," .
                "`salary` = '$salary'," .
                "`gender` = '$gender'," .
                "`age` = '$age'," .
                "`birthDate` = '$birthDate' " .
                " WHERE `ev_id` = '$ev_id'";
            mysqli_query($handle, $sql_update);
            // echo $sql_update;
        }
    } else {
        $results = '{"results_data":null}';
        echo $results;
    }
?>
