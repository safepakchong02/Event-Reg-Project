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
    } else if ($event_view == 'reg') {

        if ($_POST['id'] != '') {
            $id = $_POST["id"];
            $reg_date = $_POST["reg_date"];
            $sql_reg = "UPDATE `event_member` SET `reg_date` = '$reg_date'" .
                " WHERE `id` = '$id'";
            mysqli_query($handle, $sql_reg);
            // echo $sql_reg;
        }

        //******************** else *********************//
    } else if ($event_view == 'add') {
        $no = 1;
        if ($_POST["no"] == "") {
            $sql = "SELECT MAX(`no`) AS 'no' FROM `event_member` " .
                "WHERE `ev_id` = '" . $_POST["ev_id"] . "' AND" .
                "`del` = '0'";

            $resource_data = mysqli_query($handle, $sql);
            $count_row = mysqli_num_rows($resource_data);

            if ($count_row > 0) {
                while ($result = mysqli_fetch_assoc($resource_data)) {
                    $no = ((int)$result["no"]) + (int)1;
                } // end while
            } // end if
        } else $no = (int)$_POST["no"];
        
        $sql_add_event = "insert into `event_member` set " .
            "`ev_id`='" . $_POST["ev_id"] . "'," .
            "`add_by`='" . $_SESSION['user_id'] . "'," .
            "`del`='0'," .
            "`emp_id`='" . $_POST['emp_id'] . "'," .
            "`card_id`='" . $_POST['card_id'] . "'," .
            "`prefix`='" . $_POST['prefix'] . "'," .
            "`name`='" . $_POST['name'] . "'," .
            "`call`='" . $_POST["call"] . "'," .
            "`com_name`='" . $_POST["com_name"] . "'," .
            "`dep`='" . $_POST['dep'] . "'," .
            "`pos`='" . $_POST['pos'] . "'," .
            "`no`='" . $no . "'," .
            "`gender`='" . $_POST['gender'] . "'," .
            "`age`='" . $_POST["age"] . "'," .
            "`birthDate`='" . $_POST['birthDate'] . "'," .
            "`comment`='" . $_POST['comment'] . "'," .
            "`reg_date`='" . $_POST['reg_date'] . "';";

        mysqli_query($handle, $sql_add_event);
        echo "{" .
            "\"emp_id\" : \"". $_POST["emp_id"] . "\", " .
            "\"card_id\" : \"" . $_POST["card_id"] . "\", " .
            "\"name\" : \"" . $_POST["name"] . "\", " .
            "\"call\" : \"" . $_POST["call"] . "\", " .
            "\"com_name\" : \"" . $_POST["com_name"] . "\", " .
            "\"dep\" : \"" . $_POST["dep"] . "\", " .
            "\"pos\" : \"" . $_POST["pos"] . "\", " .
            "\"no\" : \"" . $no . "\", " .
            "\"gender\" : \"" . $_POST["gender"] . "\", " .
            "\"age\" : \"" . $_POST["age"] . "\", " .
            "\"birthDate\" : \"" . $_POST["birthDate"] . "\" " . 
        "}";
        // echo $sql_add_event;
    } else if ($event_view == 'hasExist') {
        $sql = "SELECT * FROM `event_member` " .
            "WHERE del = '0' and `" . $_POST["key"] . "`='" . $_POST["value"] . "'" .
            " and `ev_id`='" . $_POST["ev_id"] . "'";
        // echo $sql;
        $resource_data = mysqli_query($handle, $sql);
        $count_row = mysqli_num_rows($resource_data);

        if ($count_row > 0) {
            echo "{\"isExist\": true}";
        } else {
            echo "{\"isExist\": false}";
        }
    } else if ($event_view == 'noData') {
        $sql = "SELECT * FROM `event_member` " .
            "WHERE del = '0' and `" . $_POST["key"] . "`='" . $_POST["value"] . "'" .
            " and `ev_id`='" . $_POST["ev_id"] . "'";

        $resource_data = mysqli_query($handle, $sql);
        $count_row = mysqli_num_rows($resource_data);

        if ($count_row > 0) {
            while ($result = mysqli_fetch_assoc($resource_data)) {
                $rows[] = $result;
            }

            $data = json_encode($rows);
            echo "{\"noData\": false, \"results_data\": $data}";
            
        } else {
            echo "{\"noData\": true}";
        }
    } else if ($event_view == 'show_data_edit') {

        $id = $_GET["id"];
        $sql = "SELECT * FROM `event_member` " .
            "WHERE `id` = '$id'";

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
                "`prefix`='" . $_POST['prefix'] . "'," .
                "`name`='" . $_POST['name'] . "'," .
                "`call`='" . $_POST["call"] . "'," .
                "`com_name`='" . $_POST["com_name"] . "'," .
                "`dep`='" . $_POST['dep'] . "'," .
                "`pos`='" . $_POST['pos'] . "'," .
                "`no`='" . $_POST['no'] . "'," .
                "`gender`='" . $_POST['gender'] . "'," .
                "`age`='" . $_POST["age"] . "'," .
                "`birthDate`='" . $_POST['birthDate'] . "'," .
                "`comment`='" . $_POST['comment'] . "'" .
                " WHERE `id` = '$id';";

            mysqli_query($handle, $sql_update);
            // echo $sql_update;
        }

        //******************** delete data *********************//
    } else if ($event_view == 'del_reg') {

        if ($_GET['id'] != '') {
            $id = $_GET['id'];
            $sql_delete_reg = "UPDATE `event_member` SET `del` = '1'" .
                " WHERE `id` = '$id'";
            mysqli_query($handle, $sql_delete_reg);
            // echo $sql_delete_reg;
        }

    } else if ($event_view == 'report_sum') {
        if (isset($_GET["ev_id"])) {
            // get all count
            $sql_sum_report = " SELECT COUNT(*) as `all` FROM `event_member` " .
                " WHERE `ev_id` = '" . $_GET["ev_id"] . "' and `del` = '0'";

            $resource_data = mysqli_query($handle, $sql_sum_report);

            while ($result = mysqli_fetch_assoc($resource_data)) {
                $all = $result['all'];
            }

            // get join count
            $sql_sum_report = " SELECT COUNT(*) as `join` FROM `event_member` " .
                " WHERE `ev_id` = '" . $_GET["ev_id"] . "' and `del` = '0' and `reg_date` != ''";

            $resource_data = mysqli_query($handle, $sql_sum_report);

            while ($result = mysqli_fetch_assoc($resource_data)) {
                $join = $result['join'];
            }

            // get no_join count
            $sql_sum_report = " SELECT COUNT(*) as `no_join` FROM `event_member` " .
                " WHERE `ev_id` = '" . $_GET["ev_id"] . "' and `del` = '0' and `reg_date` = ''";

            $resource_data = mysqli_query($handle, $sql_sum_report);

            while ($result = mysqli_fetch_assoc($resource_data)) {
                $no_join = $result['no_join'];
            }
            
            echo "{
                \"report_sum\": {
                    \"all\": $all ,
                    \"Join\": $join ,
                    \"no_join\": $no_join
                }
            }";
        } else {
            echo "false";    
        }
    } else if ($event_view == 'report_data') {

        if (isset($_GET["ev_id"]) && isset($_GET["group_by"])) {
            $ev_id = $_GET["ev_id"];
            $group_by = $_GET["group_by"];
            
            // join
            $sql_report_data = "SELECT one.$group_by , COALESCE(one.c, 0) AS \"join\" , 
            COALESCE(two.c, 0) AS \"no_join\"
            FROM
            (
                SELECT $group_by, COUNT(*) AS \"c\"
                FROM event_member
                WHERE ev_id = \"$ev_id\" AND del = \"0\" AND reg_date != \"\"
                GROUP BY $group_by
            ) as one
            LEFT OUTER JOIN
            (
                SELECT $group_by, COUNT(*) AS \"c\"
                FROM event_member
                WHERE ev_id = \"$ev_id\" AND del = \"0\" AND reg_date = \"\"
                GROUP BY $group_by
            ) as two
            ON one.$group_by  = two.$group_by
            UNION
            SELECT three.$group_by , COALESCE(four.c, 0) AS \"join\" , 
            COALESCE(three.c, 0) AS \"no_join\"
            FROM
            (
                SELECT $group_by, COUNT(*) AS \"c\"
                FROM event_member
                WHERE ev_id = \"$ev_id\" AND del = \"0\" AND reg_date != \"\"
                GROUP BY $group_by
            ) as four
            RIGHT OUTER JOIN
            (
                SELECT $group_by, COUNT(*) AS \"c\"
                FROM event_member
                WHERE ev_id = \"$ev_id\" AND del = \"0\" AND reg_date = \"\"
                GROUP BY $group_by
            ) as three
            ON four.$group_by  = three.$group_by
            ORDER BY `join` DESC";

            $resource_data = mysqli_query($handle, $sql_report_data);
            
            while ($result = mysqli_fetch_assoc($resource_data)) {
                $rows[] = $result;
            }

            $data = json_encode($rows);
            echo "{
                \"report_data\": $data
            }";
        }
    } else if ($event_view == 'reset_reg') {
        if ($_GET['id'] != '') {
            $id = $_GET['id'];
            $sql_delete_reg = "UPDATE `event_member` SET `reg_date` = ''" .
                " WHERE `id` = '$id'";
            mysqli_query($handle, $sql_delete_reg);
            // echo $sql_delete_reg;
        }
    } else {
        echo "";
    }
    ?>
