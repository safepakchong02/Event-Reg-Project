 <?php
    function covertBoolean($bool)
    {
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
    if ($event_view == 'import') {
        $ev_id = $_GET["ev_id"];
        $sql = "SELECT * FROM event_setting WHERE ev_id = '$ev_id'";

        $resource_data = mysqli_query($handle, $sql);
        $count_row = mysqli_num_rows($resource_data);

        if ($count_row > 0) {
            while ($result = mysqli_fetch_assoc($resource_data)) {
                foreach ($result as $key => $val) {
                    switch ($key) {
                        case "ev_id":
                            $js[$key] = $result[$key];
                            break;
                        case "has_reg_by":
                            $js[$key] = $result[$key];
                            break;
                        default:
                            if ($val == "1") $js[$key] = true;
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
    } else {
        $results = '{"results_data":null}';
        echo $results;
    }
    ?>
