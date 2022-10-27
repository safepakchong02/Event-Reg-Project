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
    } else if ($event_view == 'del_all') {

        if (isset($_GET["ev_id"])) {
            $ev_id = $_GET["ev_id"];
            $sql = "UPDATE `event_member` SET `del` = '1' WHERE `ev_id` = '$ev_id';";
            mysqli_query($handle, $sql);

            echo "ev_id = $ev_id";
        } else {
            echo "no ev_id";
        } // end if else isset($_GET["ev_id"])

        //******************** add data *********************//
    } else {
        echo "false";
    }


    ?>
