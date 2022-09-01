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
        $ev_id = 1;

        // หาไอดีที่มากที่สุด
        $sql_max_val = "SELECT MAX(ev_id) FROM `events`";
        $rs = mysqli_query($handle, $sql_max_val);
        $count_row = mysqli_num_rows($rs);

        if ($count_row > 0) {
            while ($result = mysqli_fetch_assoc($rs)) {
                $ev_id = intval($result["MAX(ev_id)"]) + 1;
            } // end while
        } // end if

        //sql insert data
        $table_name = "ev" . $ev_id . "u" . $_SESSION["user_id"];
        $sql_add_event = "insert into events set " .
            "ev_id='" . $ev_id . "'," .
            "ev_title='" . $_POST['ev_title'] . "'," .
            "ev_assign_to='" . $_POST['ev_assign_to'] . "'," .
            "ev_date_start='" . $_POST['ev_date_start'] . "'," .
            "ev_date_end='" . $_POST['ev_date_end'] . "'," .
            "ev_create_by='" . $_SESSION["user_id"] . "'," .
            "ev_table_name='" . $table_name . "'," .
            "ev_del = '0';";

        mysqli_query($handle, $sql_add_event);
        // echo $sql_add_event;

        //******************** create table *********************//
        $sql_create_table = "CREATE TABLE " . $table_name . " (" .
            "ev_id int(11) ," .
            "PRIMARY KEY (ev_id)" .
            ");";
        mysqli_query($handle, $sql_create_table);

        //******************** add data to table *********************//
        $sql_add_data = "INSERT INTO `event_setting` SET " .
            "`ev_id` = '" . $ev_id . "'," .
            "`walk_in` = '1'," .
            "`emp_id` = '0'," .
            "`card_id` = '0'," .
            "`name` = '0'," .
            "`call` = '0'," .
            "`com_name` = '0'," .
            "`dep` = '0'," .
            "`pos` = '0'," .
            "`salary` = '0'," .
            "`gender` = '0'," .
            "`age` = '0'," .
            "`birthDate` = '0' ";
        mysqli_query($handle, $sql_add_data);

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

        //******************** delete data *********************//
    } else if ($event_view == 'del_event') {

        if ($_GET['ev_id'] != '') {
            $ev_id = $_GET['ev_id'];
            $sql_delete_event = "UPDATE `events` SET `ev_del` = '1'" .
            " WHERE `events`.`ev_id` = '$ev_id'";
            mysqli_query($handle, $sql_delete_event);
            // echo $sql_delete_event;
        }
    
        //******************** else *********************//
    } else {
        $results = '{"results_data":null}';
        echo $results;
    }


    ?>
