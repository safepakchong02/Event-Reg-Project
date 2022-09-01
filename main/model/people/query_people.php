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
            $sql = "SELECT * FROM users " .
                "LEFT JOIN departments " .
                "ON users.dep_id = departments.dep_id " .
                "WHERE ev_del = '0'";
        }

        $resource_data = mysqli_query($handle, $sql);
        $count_row = mysqli_num_rows($resource_data);

        if ($count_row > 0) {
            while ($result = mysqli_fetch_assoc($resource_data)) {
                 $rows[] = $result;
            }

            $data = json_encode($rows);
            //$totaldata = sizeof($rows);
            $results = '{"results_data":' . $data . '}';
        }
        echo $results;

        //******************** add data *********************//
    } else if ($event_view == 'add') {
        //sql insert data
        $sql_add_event = "insert into users set " .
            "user_id = '" . $_POST['user_id'] . "', " .
            "user_name = '" . $_POST['user_name'] . "', " .
            "user_surname = '" . $_POST['user_surname'] . "', " .
            "dep_id = '" . $_POST['dep_id'] . "', " .
            "perm = '" . $_POST['perm'] . "', " .
            "ev_del = '0'";
        mysqli_query($handle, $sql_add_event);
        // echo $sql_add_event;

        //******************** view Edit *********************//
    } else if ($event_view == 'show_data_edit') {

        $sql = "SELECT * FROM `users`" .
            " WHERE user_id = '" . $_GET['user_id'] . "'";
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
        if ($_POST['user_id'] != '') {
            $user_id = $_POST['user_id'];
            $user_name = $_POST['user_name'];
            $user_surname = $_POST['user_surname'];
            $dep_id = $_POST['dep_id'];
            $perm = $_POST['perm'];
            $ev_del = $_POST['ev_del'];






            $sql_update = "UPDATE `users` SET `user_name` = '$user_name'," .
               "`user_surname` = '$user_surname'," .
                "user_id = '$user_id'," .
                "`dep_id` = '$dep_id'," .
                "`perm` = '$perm'," .
                "`ev_del` = '$ev_del' WHERE `users`.`user_id` = '$user_id'";
            mysqli_query($handle, $sql_update);
            // echo $sql_update;
        }

        //******************** delete data *********************//
    } else if ($event_view == 'del_event') {

        if ($_GET['user_id'] != '') {
            $ev_id = $_GET['ev_id'];
            $sql_delete_event = "UPDATE `users` SET `ev_del` = '1'" .
                " WHERE `users`.`user_id` = '$user_id'";
            mysqli_query($handle, $sql_delete_user);
            // echo $sql_delete_event;
        }

        //******************** else *********************//
    } else {
        $results = '{"results_data":null}';
        echo $results;
    }


    ?>
