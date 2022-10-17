<!-- import ctrl -->
<?
$ctrl_name = "reg_register_ctrl";
include("main/controller/$ctrl_name.php");

if (!isset($_GET["ev_id"])) { ?>
    <meta http-equiv="refresh" content="0;url=index.php?p=reg&m=event_dashboard">
<? } ?>

<style>
    body {
        margin: 0;
        background-color: #ee5b23;
    }

    .btn_title {
        background-color: #00b0b2;
        color: #FBFCFC;
    }
</style>

<!-- start content -->
<div ng-controller="<?= $ctrl_name ?>"><br>
    <!-- เพิ่มข้อมูล -->
    <? include("main/module/event/event_detail_add.php"); ?>
    <!-- จบการเพิ่มข้อมูล -->

    <!-- success -->
    <? include("main/body/status_reg_success.php"); ?>
    <? include("main/body/status_success.php"); ?>
    <!-- end success -->

    <!-- error -->
    <? include("main/body/status_reg_error_isNoData.php"); ?>
    <? include("main/body/status_reg_error_isExist.php"); ?>
    <!-- end error -->

    <!-- header -->
    <div class="container-fluid"><br>
        <div class="row justify-content-md-center" align="center">
            <div class="col-xs-6 col-md" style="padding-bottom: 1rem;">
                <div class="card text-white btn_title mb-3 shadow" style="width: 20rem; border-radius: 2rem;">
                    <h3 class="card-body" align="center">กิจกรรม <b>{{event_data[0].ev_title}}</b></h3>
                    <h8 class="card-title" align="center">{{event_data[0].ev_date_start}} - {{event_data[0].ev_date_end}}</h8>
                </div>
            </div>
        </div>
    </div>
    <!-- end header -->

    <!-- register -->
    <div class="container-fluid">
        <div class="row justify-content-md-center" align="center">
            <!-- open register -->
            <div class="col-xs-6 col-md" style="padding-bottom: 1rem;" ng-show="regIsOpen" id="reg_open">
                <div class="card text-black btn_body mb-3 shadow" style="max-width: 35rem; border-radius: 2rem;">
                    <div class="card-body">
                        <div class="container my-5">
                            <div class="row justify-content-center" align="center">
                                <div class="d-grid gap-2 col-md-4">
                                    <img src="asset\img\logo sut.png" class="rounded mx-auto d-block" width="150" height="200">
                                </div>
                            </div><br><br>
                            <div class="row justify-content-center" align="center">
                                <div class="d-grid gap-2 col-md-4">
                                    <span class="h3"><b>ลงทะเบียน</b></span>
                                </div>
                            </div>
                            <div class="row justify-content-center" align="center">
                                <div class="d-grid gap-2 col-md-8 col-xs-5">
                                    <input type="text" id="reg" placeholder="{{has_reg_by}}" ng-model="reg" name="reg" class="form-control">
                                </div>
                            </div><br>
                            <div class="row justify-content-center" align="center">
                                <div class="d-grid gap-2 col-md-8 col-xs-5">
                                    <button type="button" ng-click="register()" class="btn btn-primary btn-block"> ลงทะเบียนเข้ากิจกรรม</button>
                                </div>
                            </div><br>
                            <div class="row justify-content-center" align="center" ng-hide="!check.walk_in">
                                <div class="d-grid gap-2 col-md-8 col-xs-5">
                                    <button type="button" class="btn btn-success btn-block" data-bs-toggle="modal" data-bs-target="#modal-detail_add">เพิ่มข้อมูลผู้ลงทะเบียนใหม่</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end open register -->
            <!-- close register -->
            <div class="col-xs-6 col-md" style="padding-bottom: 1rem;" ng-show="!regIsOpen" id="reg_close">
                <div class="card text-black btn_body mb-3 shadow" style="max-width: 35rem; border-radius: 2rem;">
                    <div class="card-body">
                        <div class="container my-5">
                            <div class="row justify-content-center" align="center">
                                <div class="col-12"><br>
                                    <i class="bi bi-x-circle" style="color: #ff0000; font-size:7rem;"></i>
                                </div>
                            </div><br>
                            <div class="row justify-content-center" align="center">
                                <div class="col-12">
                                    <span class="h3 text-black"><b>ระบบปิดลงทะเบียน</b></span>
                                </div>
                            </div><br>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end close register -->
        </div>
    </div>
    <!-- end register -->
</div>
<!-- end content -->