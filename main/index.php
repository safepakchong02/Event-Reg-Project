<?php
@session_start();

date_default_timezone_set('Asia/Bangkok');
include("main/function/function_main.php");
include("main/function/function_sql.php");
include("main/function/function_form.php");
include("main/function/function_date.php");

// $_SESSION["user_name"] = "ปัญญทัศน์";
// $_SESSION["user_id"] = "99";
// $_SESSION["perm"] = "admin";

// $_SESSION["user_name"] = "Punnyathat";
// $_SESSION["user_id"] = "6204709";
// $_SESSION["perm"] = "manager";

// $_SESSION["user_name"] = "Punnyathat";
// $_SESSION["user_id"] = "6204709";
// $_SESSION["perm"] = "register";

if (isset($_GET["p"])) $_SESSION["path"] = $_GET["p"];
else $_SESSION["path"] = "event";

// global var
$app_name = "SuthReg";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- header -->
    <? include("main/body/header.php"); ?>
    <!-- end header -->
    <title>SUTH REG</title>
</head>

<body ng-app="<?= $app_name ?>">
    <? if (!isset($_SESSION["perm"])) { ?>
        <div class="container-fluid">
            <? include("main/module/login/login.php"); ?>
        </div>
    <? } elseif ($_SESSION["perm"] === "admin" || $_SESSION["perm"] === "manager") { ?>
        <div class="container-fluid">
            <div class="row">
                <!-- sidebar -->
                <? include("main/body/sidebar.php"); ?>
                <!-- end sidebar -->

                <!-- content -->
                <div class="col-10">
                    <?
                    if (isset($_GET["p"]) && isset($_GET["m"])) {
                        $path = chk_get_url($_GET["p"]);
                        $mod = chk_get_url($_GET["m"]);
                        include(module($path, $mod));
                    } else {
                        include("main/module/event/dashboard.php");
                    }
                    ?>
                </div>
                <!-- end content -->
            </div>
        </div>
    <? } elseif ($_SESSION["perm"] == "register") { ?>
        <!-- navbar -->
        <? include("main/body/navbar.php"); ?>
        <!-- end navbar -->

        <!-- content -->
        <div class="container-fluid">
            <?
            if (isset($_GET["p"]) && isset($_GET["m"])) {
                $path = chk_get_url($_GET["p"]);
                $mod = chk_get_url($_GET["m"]);
                include(module($path, $mod));
            } else {
                include("main/module/reg/event_dashboard.php");
            }
            ?>
        </div>
        <!-- end content -->
    <? } else { ?>
        <div class="container-fluid">
            <? include("main/module/login/login.php"); ?>
        </div>
    <? } ?>
</body>

</html>