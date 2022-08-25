<?php
@session_start();

date_default_timezone_set('Asia/Bangkok');
include("main/function/function_main.php");
include("main/function/function_sql.php");
include("main/function/function_form.php");
include("main/function/function_date.php");

$_SESSION["user_name"] = "Admin";
$_SESSION["perm"] = "admin";
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
    <? include("main/body/header.php"); ?>
    <title>SUTH REG</title>
</head>

<body ng-app="<?=$app_name?>">
    <div class="container-fluid">
        <div class="row">
            <!-- sidebar -->
            <? include("main/body/sidebar.php"); ?>

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
        </div>
    </div>
</body>

<script type="text/javascript">
    function myHide() {
        document.getElementById('hidepage').style.visibility = 'visible'; //content ที่ต้องการแสดงหลังจากเพจโหลดเสร็จ
        document.getElementById('hidepage2').style.display = 'none'; //content ที่ต้องการแสดงระหว่างโหลดเพจ
    }
</script>

</html>