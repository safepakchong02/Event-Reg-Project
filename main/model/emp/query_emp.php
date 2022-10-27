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
    if (@$_SESSION["perm"] == "") {
        echo "{\"status\": 403}";
    } else if ($event_view == 'show_data') {

        if ($_SESSION["perm"] == "admin") {
            $sql = "SELECT * FROM users " .
                "LEFT JOIN departments " .
                "ON users.dep_id = departments.dep_id " .
                "WHERE user_del = '0'";

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
        } else {
            echo "false";
        }
        //******************** add data *********************//
    } else if ($event_view == 'emp') {

        $sql = "SELECT `user_id`, `user_name`, `user_surname` FROM users " .
            "WHERE user_del = '0' and `perm`='register'";

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

        //******************** view Edit *********************//
    } else if ($event_view == 'dep') {
        $sql = "SELECT * FROM `departments` WHERE `dep_del` = '0'";

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
    } else if ($event_view == 'add') {

        $password = md5($_POST["user_id"]);
        //sql insert data
        $sql_add_emp = "insert into users set " .
            "user_id = '" . $_POST['user_id'] . "', " .
            "password = '" . $password . "', " .
            "user_name = '" . $_POST['user_name'] . "', " .
            "user_surname = '" . $_POST['user_surname'] . "', " .
            "dep_id = '" . $_POST['dep_id'] . "', " .
            "perm = '" . $_POST['perm'] . "', " .
            "user_del = '0'";
        mysqli_query($handle, $sql_add_emp);
        // echo $sql_add_emp;

        //******************** view Edit *********************//
    } else if ($event_view == 'show_data_edit') {

        $sql = "SELECT * FROM `users`" .
            " WHERE id = '" . $_GET['id'] . "'";
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
        if ($_POST['id'] != '') {
            $id = $_POST["id"];
            $user_id = $_POST['user_id'];
            $user_name = $_POST['user_name'];
            $user_surname = $_POST['user_surname'];
            $dep_id = $_POST['dep_id'];
            $perm = $_POST['perm'];

            $sql_update = "UPDATE `users` SET `user_name` = '$user_name'," .
                "`user_surname` = '$user_surname'," .
                "`dep_id` = '$dep_id'," .
                "`perm` = '$perm'" .
                " WHERE `users`.`id` = '$id'";
            mysqli_query($handle, $sql_update);
            // echo $sql_update;
        }

        //******************** delete data *********************//
    } else if ($event_view == 'del_emp') {

        if ($_GET['id'] != '') {
            $id = $_GET['id'];
            $sql_delete_emp = "UPDATE `users` SET `user_del` = '1'" .
                " WHERE `users`.`id` = '$id'";
            mysqli_query($handle, $sql_delete_emp);
            // echo $sql_delete_event;
        }

        //******************** else *********************//
    } else {
        $results = '{"results_data":null}';
        echo $results;
    }


    ?>