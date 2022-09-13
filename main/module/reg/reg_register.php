<!-- import ctrl -->
<?
$ctrl_name = "reg_register_ctrl";
include("main/controller/$ctrl_name.php");

if (!isset($_GET["ev_id"])) { ?>
    <meta http-equiv="refresh" content="0;url=index.php?p=reg&m=event_dashboard">
<? } ?>

<!-- start content -->
<div class="container-fluid" ng-controller="<?= $ctrl_name ?>"><br>
    <!-- เพิ่มข้อมูล -->
    <? include("main/module/event/event_detail_add.php"); ?>
    <!-- จบการเพิ่มข้อมูล -->

    <!-- success -->
    <? include("main/body/status_reg_success.php"); ?>
    <!-- end success -->

    <!-- error -->
    <? include("main/body/status_reg_error_isNoData.php"); ?>
    <? include("main/body/status_reg_error_isExist.php"); ?>
    <!-- end error -->

    <!-- header -->
    <div class="row">
        <div class="col">
            <h1>ชื่อกิจกรรม: {{event_data[0].ev_title}}</h1>
            <h3>วันที่/เวลา: {{event_data[0].ev_date_start}} ถึง {{event_data[0].ev_date_end}}</h3>
        </div>
    </div><br>
    <!-- end header -->

    <!-- register -->
    <div class="container my-5"><br><br>
        <div class="row justify-content-center" align="center">
            <div class="col-xs-3 col-lg-6">
                <span class="h3">ลงทะเบียน</span>
            </div>
        </div><br><br>
        <div class="row justify-content-center" align="center">
            <div class="col-6">
                <input type="text" placeholder="{{has_reg_by}}" ng-model="reg" name="reg" class="form-control" required>
            </div>
        </div><br>
        <div class="row justify-content-center" align="center">
            <div class="col-6">
                <button type="button" ng-click="register()" class="btn btn-primary btn-block col-md-12"> ลงทะเบียนเข้ากิจกรรม</button>
            </div>
        </div><br>
        <div class="row justify-content-center" align="center" ng-hide="!check.walk_in">
            <div class="col-6">
                <button type="button" class="btn btn-success btn-block col-md-12" data-bs-toggle="modal" data-bs-target="#modal-detail_add">เพิ่มข้อมูลผู้ลงทะเบียนใหม่</button>
            </div>
        </div>
    </div>
    <!-- end register -->
</div>
<!-- end content -->