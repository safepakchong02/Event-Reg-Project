 <?php
    function covertBoolean($bool)
    {
        if ($bool == "true") return "1";
        else return "0";
    }

    function convertUTF($val)
    {
        if (utf8_decode($val) != "") {
            return utf8_decode($val) ;
        } else {
            return $val;
        }
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

    //******************** import data *********************//
    if ($event_view == 'import') {
        if (isset($_POST["ev_id"])) {
            $add_data = [];

            $data = json_decode($_POST["data"]);
            for ($i = 0; $i < count($data); $i++) {
                $arr = array(
                    $_POST["ev_id"],
                    $_SESSION['user_id'],
                    "0",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    ""
                );

                foreach ($data[$i] as $key => $val) {
                    switch ($key) {
                        case "emp_id":
                            $arr[3] = (string) $val;
                            break;
                        case "card_id":
                            $arr[4] = (string) $val;
                            break;
                        case "name":
                            $arr[5] = (string) $val;
                            break;
                        case "call":
                            $arr[6] = (string) $val;
                            break;
                        case "com_name":
                            $arr[7] = (string) $val;
                            break;
                        case "dep":
                            $arr[8] = (string) $val;
                            break;
                        case "pos":
                            $arr[9] = (string) $val;
                            break;
                        case "no":
                            $arr[10] = (string) $val;
                            break;
                        case "gender":
                            $arr[11] = (string) $val;
                            break;
                        case "age":
                            $arr[12] = (string) $val;
                            break;
                        case "birthDate":
                            $arr[13] = (string) $val;
                            break;
                    } // end switch
                } // end foreach

                $add_data[] = $arr;
            } // end for loop

            $add_data = json_encode($add_data);
            $add_data = substr($add_data, 1, -1);
            $add_data = str_replace("[", "(", $add_data);
            $add_data = str_replace("]", ")", $add_data);

            $sql = "INSERT INTO event_member(
                `ev_id`, `add_by`, `del`, `emp_id`, `card_id`,
                `name`, `call`, `com_name`, `dep`, `pos`, 
                `no`, `gender`, `age`, `birthDate`, `reg_date`
                ) VALUES $add_data";
            // $rs = mysqli_query($handle, $sql);

            // echo "{\"sql\": $rs, \"status\": true}";
            echo $sql;
        } else {
            echo "false";
        } // end if isset($_POST["ev_id"])
    } else {
        $results = '{"results_data":null}';
        echo $results;
    } // end if $event_view
    ?>
