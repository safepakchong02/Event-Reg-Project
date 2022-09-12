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
    if ($event_view == 'login') {
        $user_id = $_POST["user_id"];
        $password = md5($_POST["password"]);

        $sql = "SELECT * FROM users " .
            "WHERE user_id = '$user_id' and `password` = '$password'";

        $resource_data = mysqli_query($handle, $sql);
        $count_row = mysqli_num_rows($resource_data);

        if ($count_row > 0) {
            while ($result = mysqli_fetch_assoc($resource_data)) {
                $_SESSION["user_name"] = $result["user_name"];
                $_SESSION["user_id"] = $result["user_id"];
                $_SESSION["perm"] = $result["perm"];
            }
            echo "{\"status\": true}";
        } else {
            echo "{\"status\": false}";
        }

        //******************** add data *********************//
    } elseif ($event_view == 'logout') {
        @session_destroy();
    } else {
        $results = '{"results_data":null}';
        echo $results;
    }


    ?>
