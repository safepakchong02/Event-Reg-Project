<!-- style -->
<style>
    .bi-person-fill {
        color: #808080;
    }

    .bi-lock-fill {
        color: #808080;
    }

    .center_screen {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    body {
        background-image: url("asset/img/suth_bg.jpg");
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }

    .captcha-input {
        background: #FFF url("") repeat-y left center;
        /* padding-left: 50px; */
    }
</style>
<!-- end style -->

<!-- import ctrl -->
<?
$ctrl_name = "login_ctrl";
include("main/controller/$ctrl_name.php");
?>
<!-- end import ctrl -->

<!-- status success -->
<? include("main/body/status_login_success.php"); ?>
<!-- end status success -->

<!-- status error -->
<? include("main/body/status_login_error.php"); ?>
<!-- end status error -->

<!-- logout -->
<? include("main/body/status_login_logout.php"); ?>
<!-- end logout -->

<!-- content login -->
<div class="container-fluid center_screen col-10 col-xs-6" ng-controller="<?= $ctrl_name ?>"><br><br>
    <? if (!isset($_GET["event"])) { ?>
        <form ng-submit="login()">
            <div class="row justify-content-center" align="center">
                <div class="card text-black btn_title col-xs-6 col-mb-3 shadow" style=" height: 23rem; width: 40rem; border-radius: 2rem;">
                    <div class="row justify-content-center" align="center">
                        <div class="col-12"><br>
                            <span class="h3">ระบบลงทะเบียนออนไลน์</span>
                        </div>
                    </div><br>
                    <div class="row justify-content-center" align="center">
                        <div class="col-6">
                            <span>สำหรับเจ้าหน้าที่</span>
                        </div>
                    </div>
                    <div class="row justify-content-center" align="center">
                        <div class="d-grid gap-2 col-10 col-xs-5">
                            <div class="input-group flex-nowrap">
                                <input required type="text" ng-model="user_id" class="form-control col-md-12" placeholder="รหัสพนักงาน">
                                <span class="input-group-text " id="addon-wrapping"><i class="bi bi-person-fill"></i></span>
                            </div>
                        </div>
                    </div><br>
                    <div class="row justify-content-center" align="center">
                        <div class="d-grid gap-2 col-10 col-xs-5">
                            <div class="input-group flex-nowrap">
                                <input required type="password" ng-model="password" class="form-control col-md-12" placeholder="รหัสผ่าน" autocomplete="username">
                                <span class="input-group-text" id="addon-wrapping"><i class="bi bi-lock-fill"></i></span>
                            </div>
                        </div>
                    </div><br>
                    <div class="row justify-content-center" align="center">
                        <div class="d-grid gap-2 col-10 col-xs-5">
                            <div class="input-group flex-nowrap">
                                <input required type="text" ng-model="captcha_code" class="form-control col-md-12" placeholder="Captcha Code">
                                <span class="input-group-text" id="addon-wrapping"><img src="main/module/login/captchaImageSource.php"></span>
                            </div>
                        </div>
                    </div><br>
                    <div class="row justify-content-center" align="center">
                        <div class="d-grid gap-2 col-10 col-xs-5">
                            <button type="summit" class="btn btn-primary btn-block">เข้าสู่ระบบ</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    <? } ?>
</div>
<!-- end content login -->