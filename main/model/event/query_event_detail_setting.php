 <?php
    function covertBoolean($bool) {
        if ($bool == "true") return "1";
        else return "0";
        // return $bool;
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
                foreach($result as $key => $val) {
                    switch($key) {
                        case "ev_id":
                            $js[$key] = $result[$key];
                            break;
                        case "has_reg_by":
                            $js[$key] = $result[$key];
                            break;
                        default :
                            if($val == "1") $js[$key] = true;
                            else $js[$key] = false;
                    } // end switch
                } // end foreach

                $rows[] = $js;
            } // end while

            $data = json_encode($rows);
            //$totaldata = sizeof($rows);
            $results = '{"results_data":' . $data . '}';
        } else {
            $results = "null";
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
            $gender = covertBoolean($_POST["gender"]);
            $age = covertBoolean($_POST["age"]);
            $has_reg_by = $_POST["has_reg_by"];
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
                "`gender` = '$gender'," .
                "`age` = '$age'," .
                "`has_reg_by` = '$has_reg_by'," .
                "`birthDate` = '$birthDate' " .
                " WHERE `event_setting`.`ev_id` = '$ev_id'";
            mysqli_query($handle, $sql_update);
            // echo $sql_update;
        }
    } else if ($event_view == 'import') {
        if ($_POST['ev_id'] != '') {
            $ev_id = $_POST["ev_id"];
            $emp_id = covertBoolean($_POST["emp_id"]);
            $card_id = covertBoolean($_POST["card_id"]);
            $name = covertBoolean($_POST["name"]);
            $call = covertBoolean($_POST["call"]);
            $com_name = covertBoolean($_POST["com_name"]);
            $dep = covertBoolean($_POST["dep"]);
            $pos = covertBoolean($_POST["pos"]);
            $gender = covertBoolean($_POST["gender"]);
            $age = covertBoolean($_POST["age"]);
            $birthDate = covertBoolean($_POST["birthDate"]);
            $sql_update = "UPDATE `event_setting` SET " .
                "`emp_id` = '$emp_id'," .
                "`card_id` = '$card_id'," .
                "`name` = '$name'," .
                "`call` = '$call'," .
                "`com_name` = '$com_name'," .
                "`dep` = '$dep'," .
                "`pos` = '$pos'," .
                "`gender` = '$gender'," .
                "`age` = '$age'," .
                "`birthDate` = '$birthDate' " .
                " WHERE `event_setting`.`ev_id` = '$ev_id'";
            mysqli_query($handle, $sql_update);
            // echo $sql_update;
        }
    } else {
        $results = '{"results_data":null}';
        echo $results;
    }
?>
