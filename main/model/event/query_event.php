 <?php

    if (@$_GET['event_view'] != '') {
        $event_view = @$_GET['event_view'];
    } else if (@$_POST['event_view'] != '') {
        $event_view = @$_POST['event_view'];
    } else {
        $event_view = '';
    }
    $today = date('Y') . '-' . date('m') . '-' . date('d');
    $today_re = date('d') . '-' . date('m') . '-' . date('Y');

    include_once('./Event-Reg-Project/asset/config/config.php');

    if ($event_view == 'show_data') {

        $sql = "SELECT * FROM `events` 
        LEFT JOIN 'users' 
        ON 'events.ev_assign_to' = 'users.user_id'
        WHERE ev_del = '0'";
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
    } else if ($event_view == "show_dropdown") {
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
        //sql insert data
        $sql_add_event = "insert into event set
            title='" . $_POST['title_event'] . "' ,
            emp_id='" . $_POST['emp_id'] . "' ,
            dp_id='" . $_POST['dp_id'] . "' ,
            status ='1"."';";
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
