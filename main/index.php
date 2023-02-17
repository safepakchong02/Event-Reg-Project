<?php
@session_start();

date_default_timezone_set('Asia/Bangkok');

// global var
$app_name = "SUTEvent";
$_SESSION["default_path"] = "main/module/event/dashboard.php";

include("main/function/function_main.php");
include("main/function/function_date.php");
include("main/function/function_cookies.php");
?>
<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" type="text/css" href="main/css/index.css">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- header -->
    <? include("main/body/header.php"); ?>
    <!-- end header -->
    <title>SUT-Event</title>

    <!-- handle login -->
    <?
    $ctrl_path = "login";
    $ctrl_name = "login_handle_ctrl";
    include("main/controller/$ctrl_path/$ctrl_name.php");
    ?>
    <!-- end handle login -->
</head>

<body class="grBg"ng-app="<?= $app_name ?>" ng-controller="<?= $ctrl_name ?>" style="font-family: 'IBM Plex Sans Thai Looped', sans-serif !important;">
    <? if(@$_GET["p"] != "login") include("main/body/navbar.php"); ?>
    <div class="container-fluid mainBg">
        <div class="row">
            <!-- content -->
            <div class="col-12">
                <?
                if (isset($_GET["p"]) && isset($_GET["m"])) {
                    $path = chk_get_url($_GET["p"]);
                    $mod = chk_get_url($_GET["m"]);
                    include(module($path, $mod));
                } else {
                    include($_SESSION["default_path"]);
                }
                ?>
            </div>
            <!-- end content -->
        </div>
    </div>
</body>

</html>