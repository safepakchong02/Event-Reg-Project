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
