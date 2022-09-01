<!-- import ctrl -->
<?
$ctrl_name = "event_detail_setting_ctrl";
include("main/controller/$ctrl_name.php");
?>

<? if (isset($_GET["ev_id"])) { ?>
    <!-- ตั่งค่าการลงทะเบียน -->
    <div class="container-fluid" ng-controller="<?= $ctrl_name ?>" ng-init="isPreview = true"><br>
        <div class="row">
            <div class="col-1" style="width: 140px;">
                <a href="index.php?p=event&m=event_detail&ev_id=<?= $_GET["ev_id"] ?>" class="btn btn-primary"><i class="bi bi-caret-left-fill"></i>ย้อนกลับ</a>
            </div>
            <div class="col">
                <h1>ตั้งค่าการลงทะเบียน</h1>
            </div>
        </div>
        <!-- preview -->
        <? include("main/module/event/event_detail_add.php"); ?>
        <!-- end preview -->
        <!--ตารางตัวแปร-->
        <div class="container">
            <form>
                <table class="table" border="2px">
                    <thead>
                        <tr>
                            <div class="row">
                                <div class="col-3">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch" ng-model="check.walk_in" id="check.walk_in" />
                                        <label class="form-check-label" for="flexSwitchCheckDefault">เปิดการลงทะเบียนเพิ่มเติม</label>
                                    </div>
                                </div>
                            </div>
                        </tr>
                        <br>
                        <tr id="1">
                            <td class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" ng-disabled="!check.walk_in" ng-model="check.emp_id" id="check">
                                <label class="custom-control-label" for="customCheck1">รหัสพนักงาน</label>
                            </td>
                            <td class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" ng-disabled="!check.walk_in" ng-model="check.card_id" id="check">
                                <label class="custom-control-label" for="customCheck1">รหัสบัตรประชาชน</label>
                            </td>
                            <td class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" ng-disabled="!check.walk_in" ng-model="check.name" id="check">
                                <label class="custom-control-label" for="customCheck1">ชื่อ-สกุล</label>
                            </td>
                            <td class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" ng-disabled="!check.walk_in" ng-model="check.call" id="check">
                                <label class="custom-control-label" for="customCheck1">เบอร์โทรศัพท์</label>
                            </td>
                        </tr>
                        <tr id="2">
                            <td class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" ng-disabled="!check.walk_in" ng-model="check.com_name" id="check">
                                <label class="custom-control-label" for="customCheck1">ชื่อบริษัท</label>
                            </td>
                            <td class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" ng-disabled="!check.walk_in" ng-model="check.dep" id="check">
                                <label class="custom-control-label" for="customCheck1">แผนก</label>
                            </td>
                            <td class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" ng-disabled="!check.walk_in" ng-model="check.pos" id="check">
                                <label class="custom-control-label" for="customCheck1">ตำแหน่ง</label>
                            </td>
                            <td class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" ng-disabled="!check.walk_in" ng-model="check.salary" id="check">
                                <label class="custom-control-label" for="customCheck1">เงินเดือน</label>
                            </td>
                        </tr>
                        <tr id="3">
                            <td class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" ng-disabled="!check.walk_in" ng-model="check.gender" id="check">
                                <label class="custom-control-label" for="customCheck1">เพศ</label>
                            </td>
                            <td class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" ng-disabled="!check.walk_in" ng-model="check.age" id="check">
                                <label class="custom-control-label" for="customCheck1">อายุ</label>
                            </td>
                            <td class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" ng-disabled="!check.walk_in" ng-model="check.birthDate" id="check">
                                <label class="custom-control-label" for="customCheck1">วันเดือนปีเกิด</label>
                            </td>
                            <td class="custom-control custom-checkbox">
                            </td>
                        </tr>
                    </thead>
                </table>
            </form>
        </div>
        <!--จบตารางตัวแปร-->
        <div class="container">
            <div class="modal-footer">
                <div class="d-flex justify-content-end pb-2" id="4">
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal-detail_add"><i class="bi bi-display"></i> Preview</button>
                    &nbsp;&nbsp;&nbsp;
                    <button ng-click="setting_save()" type="button" class="btn btn-success btn-sm"></i>บันทึก</button>
                </div>
            </div>
        </div>
    </div>
    <!-- จบ ตั่งค่าการลงทะเบียน -->
<? } else { ?>
    <meta http-equiv="refresh" content="0;url=index.php?p=event&m=dashboard">
<? } ?>