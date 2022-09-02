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
        } else {
            $sql = "SELECT * FROM events " .
                "LEFT JOIN users " .
                "ON events.ev_assign_to = users.user_id " .
                "WHERE ev_del = '0' and ev_create_by = '" . $_SESSION["user_id"] . "'";
        }

        $resource_data = mysqli_query($handle, $sql);
        $count_row = mysqli_num_rows($resource_data);

        if ($count_row > 0) {
            while ($result = mysqli_fetch_assoc($resource_data)) {
                $js["ev_id"] = $result["ev_id"];
                $js["ev_title"] = $result["ev_title"];
                $js["ev_date_start"] = $result["ev_date_start"];
                $js["ev_date_end"] = $result["ev_date_end"];
                
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
    }


    ?>
