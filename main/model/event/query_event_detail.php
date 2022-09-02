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
                $rows[] = $result;
            }

            $data = json_encode($rows);
            //$totaldata = sizeof($rows);
            $results = '{"results_data":' . $data . '}';
            echo $results;
        }
        else {
            echo "";
        }

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

        //******************** view Edit *********************//
    } else if ($event_view == 'show_data_edit') {

        $sql = "SELECT * FROM `events`" .
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
