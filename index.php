<html>

<head>
    <?php
    @session_start();
    date_default_timezone_set('Asia/Bangkok');
    include("main/function/function_main.php");
    include("main/function/function_sql.php");
    include("main/function/function_form.php");
    include("main/function/function_date.php");
    ?>

    <title> ระบบจัดการเครื่องมือแพทย์ </title>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
</head>

<body class='hold-transition skin-blue sidebar-mini' onload='myHide();'>
    <?php if (@$_SESSION['id_user'] != "") { ?>
        <div class="wrapper">
            <?php
            require("main/body/head_top.php");
            require("main/body/side_bar.php");
            //require("main/body/display.php");
            ?>
            <div class="content-wrapper">
                <?php
                require("main/body/navicat.php");
                // CENTER
                ?>
                <div id="hidepage2" style="display:block;" align="center" width="100%">
                    <br>
                    <IMG SRC="main/images/loading.gif" WIDTH="16%" BORDER="0" ALT=""><br>
                    <h3>กรุณารอสักครู่ </h3>
                    </br>
                </div>
                <div id="hidepage" style="visibility:hidden;">
                    <?php
                    $mod = @chk_get_url($_GET['m']);
                    $path = @chk_get_url($_GET['p']);

                    include(module($mod, $path));
                    ?>
                </div>

            </div>
        </div>
        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 1.0.0
            </div>
            <strong>จัดทำโดยแผนกสารสนเทศโรงพยาบาลมหาวิทยาลัยเทคโนโลยีสุรนารี <a href="https://www.suth.go.th">ระบบจัดการเครื่องแพทย์โรงพยาบาลมหาวิทยาลัยเทคโนโลยีสุรนารี</a>.</strong>
        </footer>
    <?php
        /////////////////////
    } else {
        include("main/module/login/in.php");
    }
    echo "";
    echo "";

    ?>
</body>

<script type="text/javascript">
    function myHide() {
        document.getElementById('hidepage').style.visibility = 'visible'; //content ที่ต้องการแสดงหลังจากเพจโหลดเสร็จ
        document.getElementById('hidepage2').style.display = 'none'; //content ที่ต้องการแสดงระหว่างโหลดเพจ
    }
</script>

</html>