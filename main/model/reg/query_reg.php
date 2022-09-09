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

    //******************** show data header title*********************//
    if ($event_view == 'show_data') {
        $sql = "SELECT * FROM events " .
            "LEFT JOIN users " .
            "ON events.ev_assign_to = users.user_id " .
            "WHERE ev_id = '" . $_GET["ev_id"] . "'";

        $resource_data = mysqli_query($handle, $sql);
        $count_row = mysqli_num_rows($resource_data);

        if ($count_row > 0) {
            while ($result = mysqli_fetch_assoc($resource_data)) {
                $rows[] = $result;
            }

            $data = json_encode($rows);
            $results = '{"results_data":' . $data . '}';
            echo $results;
        } else {
            echo "";
        }
    } else if ($event_view == 'show_member') {
        $sql = "SELECT * FROM `event_member` " .
            "WHERE del = '0' and ev_id = '" . $_GET["ev_id"] . "'";

        $resource_data = mysqli_query($handle, $sql);
        $count_row = mysqli_num_rows($resource_data);
        $header = [];
        $row = [];
        $col = [];

        if ($count_row > 0) {
            while ($result = mysqli_fetch_assoc($resource_data)) {
                $rows[] = $result;
            }

            $table = json_encode($rows);
            $rs = "{\"results_data\": $table}";
            echo $rs;
        } else {
            echo "";
        }
    } else if ($event_view == 'add') {
        $sql_add_event = "insert into `event_member` set " .
            "`ev_id`='" . $_POST["ev_id"] . "'," .
            "`add_by`='" . $_SESSION['user_id'] . "'," .
            "`del`='0'," .
            "`emp_id`='" . $_POST['emp_id'] . "'," .
            "`card_id`='" . $_POST['card_id'] . "'," .
            "`name`='" . $_POST['name'] . "'," .
            "`call`='" . $_POST["call"] . "'," .
            "`com_name`='" . $_POST["com_name"] . "'," .
            "`dep`='" . $_POST['dep'] . "'," .
            "`pos`='" . $_POST['pos'] . "'," .
            "`salary`='" . $_POST['salary'] . "'," .
            "`gender`='" . $_POST['gender'] . "'," .
            "`age`='" . $_POST["age"] . "'," .
            "`birthDate`='" . $_POST['birthDate'] . "'," .
            "`reg_date`='" . $_POST['reg_date'] . "';";

        mysqli_query($handle, $sql_add_event);
        echo '{"status": true}';
        // echo $sql_add_event;
    } else if ($event_view == 'hasExist') {
        $sql = "SELECT * FROM `event_member` " .
            "WHERE del = '0' and `" . $_POST["key"] . "`='" . $_POST["value"] . "'" .
            " and `ev_id`='" . $_POST["ev_id"] . "'";

        $resource_data = mysqli_query($handle, $sql);
        $count_row = mysqli_num_rows($resource_data);

        if ($count_row > 0) {
            echo '{"isExist": true}';
        } else {
            echo '{"isExist": false}';
        }
    } else if ($event_view == 'show_data_edit') {

        $sql = "SELECT * FROM `event_member` " .
            "WHERE `id` = '$id' `and ev_id` = '" . $_GET["ev_id"] . "'";

        $resource_data = mysqli_query($handle, $sql);
        $numRows = mysqli_num_fields($resource_data);

        while ($result = mysqli_fetch_assoc($resource_data)) {
            $rows[] = $result;
        }

        $data = json_encode($rows);
        $results = '{"results_data_edit":' . $data . '}';
        echo $results;

        //******************** Update Edit *********************//
    } else if ($event_view == 'edit_form_save') {
        if ($_POST['id'] != '') {
            $id = $_POST['id'];

            $sql_update = "UPDATE `event_member` set " .
                "`emp_id`='" . $_POST['emp_id'] . "'," .
                "`card_id`='" . $_POST['card_id'] . "'," .
                "`name`='" . $_POST['name'] . "'," .
                "`call`='" . $_POST["call"] . "'," .
                "`com_name`='" . $_POST["com_name"] . "'," .
                "`dep`='" . $_POST['dep'] . "'," .
                "`pos`='" . $_POST['pos'] . "'," .
                "`salary`='" . $_POST['salary'] . "'," .
                "`gender`='" . $_POST['gender'] . "'," .
                "`age`='" . $_POST["age"] . "'," .
                "`birthDate`='" . $_POST['birthDate'] . "'," .
                "`reg_date`='" . $_POST['reg_date'] .
                "WHERE `id` = $id" . "';";

            mysqli_query($handle, $sql_update);
            // echo $sql_update;
        }

        //******************** delete data *********************//
    } else if ($event_view == 'del_event') {

        if ($_GET['id'] != '') {
            $id = $_GET['id'];
            $sql_delete_event = "UPDATE `event_member` SET `del` = '1'" .
                " WHERE `events`.`id` = '$id'";
            mysqli_query($handle, $sql_delete_event);
            // echo $sql_delete_event;
        }

        //******************** else *********************//
    } else {
        echo "";
    }
    ?>
