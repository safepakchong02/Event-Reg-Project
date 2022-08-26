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

    if ($event_view == 'show_data') {

        $sql = "SELECT * FROM events 
        LEFT JOIN users 
        ON events.ev_assign_to = users.user_id
        WHERE ev_del = '0'";
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
    } else if ($event_view == 'add') {
        //sql insert data
        $sql_add_event = "insert into event set
            title='" . $_POST['title_event'] . "' ,
            emp_id='" . $_POST['emp_id'] . "' ,
            dp_id='" . $_POST['dp_id'] . "' ,
            status ='1" . "';";
        mysqli_query($handle, $sql_add_event);
        echo "";
    } else if ($event_view == 'show_data_edit') {

        $sql = "SELECT * FROM `event` 
        where 	id = '" . $_POST['id_event'] . "'";
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

        if ($_POST['id_event'] != '') {
            $sql_update = "update event set
                title='" . $_POST['title_event'] . "' ,
                emp_id='" . $_POST['emp_id'] . "' ,
                dp_id='" . $_POST['dp_id'] . "'
                WHERE `id` = '" . $_POST['id_event'] . "'";
            mysqli_query($handle, $sql_update);
        }
    } else if ($event_view == 'del_event') {

        if ($_POST['id_event'] != '') {
            $sql_delete_event = "update event set 
                status = '0' 
                WHERE id ='" . $_POST['id_event'] . "' ";
            mysqli_query($handle, $sql_delete_event);
        }
    } else {
        $results = '{"results_data":null}';
        echo $results;
    }


    ?>
