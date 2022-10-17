<!-- import ctrl -->
<?
$ctrl_name = "event_detail_setting_ctrl";
include("main/controller/$ctrl_name.php");
?>

<? if (isset($_GET["ev_id"])) { ?>
    <!-- bypass angularJS ng-hide-->
    <script>
        const hide_element = (th, id) => {
            // console.log(th.checked);
            if (th.checked) $(`#${id}`).removeClass("ng-hide");
            else $(`#${id}`).addClass("ng-hide");
        }
    </script>

    <style>
        .border {
            border-radius: 20px;
            border: 10px #707B7C;
            padding: 25px;
            background: #F7F9F9; 
        }
    </style>
    
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
        <? include("main/module/event/event_detail_add_preview.php"); ?>
        <!-- end preview -->

        <!-- status success -->
        <? include("main/body/status_success.php"); ?>
        <!-- end status success -->
        <!--ตารางตัวแปร-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-3">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" ng-model="check.walk_in" id="check.walk_in" />
                        <label class="form-check-label" for="flexSwitchCheckDefault">เปิดการลงทะเบียนเพิ่มเติม</label>
                    </div>
                </div>
            </div><br>
            <div class="container border">
                <div class="row">
                    <div class="col-md-3 pb-4">        
                        <td class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" ng-disabled="!check.walk_in" onchange="hide_element(this,'emp_id')" ng-model="check.emp_id" id="check">
                            <label class="custom-control-label" for="customCheck1">รหัสพนักงาน</label>
                        </td>
                    </div>
                    <div class="col-md-3 pb-4">        
                        <td class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" ng-disabled="!check.walk_in" onchange="hide_element(this,'card_id')" ng-model="check.card_id" id="check">
                            <label class="custom-control-label" for="customCheck1">รหัสบัตรประชาชน</label>
                        </td>
                    </div>
                    <div class="col-md-3 pb-4">        
                        <td class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" ng-disabled="!check.walk_in" onchange="hide_element(this,'name')" ng-model="check.name" id="check">
                            <label class="custom-control-label" for="customCheck1">ชื่อ-สกุล</label>
                        </td>
                    </div>
                    <div class="col-md-3 pb-4">        
                        <td class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" ng-disabled="!check.walk_in" onchange="hide_element(this,'call')" ng-model="check.call" id="check">
                            <label class="custom-control-label" for="customCheck1">เบอร์โทรศัพท์</label>
                        </td>
                    </div>
                    <div class="col-md-3 pb-4">        
                        <td class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" ng-disabled="!check.walk_in" onchange="hide_element(this,'com_name')" ng-model="check.com_name" id="check">
                            <label class="custom-control-label" for="customCheck1">ชื่อบริษัท</label>
                        </td>
                    </div>
                    <div class="col-md-3 pb-4">        
                        <td class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" ng-disabled="!check.walk_in" onchange="hide_element(this,'dep')" ng-model="check.dep" id="check">
                            <label class="custom-control-label" for="customCheck1">แผนก</label>
                        </td>
                    </div>
                    <div class="col-md-3 pb-4">        
                        <td class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" ng-disabled="!check.walk_in" onchange="hide_element(this,'pos')" ng-model="check.pos" id="check">
                            <label class="custom-control-label" for="customCheck1">ตำแหน่ง</label>
                        </td>
                    </div> 
                    <div class="col-md-3 pb-4">        
                        <td class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" ng-disabled="!check.walk_in" onchange="hide_element(this,'gender')" ng-model="check.gender" id="check">
                            <label class="custom-control-label" for="customCheck1">เพศ</label>
                        </td>
                    </div>
                    <div class="col-md-3 pb-4">        
                        <td class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" ng-disabled="!check.walk_in" onchange="hide_element(this,'age')" ng-model="check.age" id="check">
                            <label class="custom-control-label" for="customCheck1">อายุ</label>
                        </td>
                    </div>
                    <div class="col-md-3 pb-4">        
                        <td class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" ng-disabled="!check.walk_in" onchange="hide_element(this,'birthDate')" ng-model="check.birthDate" id="check">
                            <label class="custom-control-label" for="customCheck1">วันเดือนปีเกิด</label>
                        </td>
                    </div>
                </div>
                <!--จบตารางตัวแปร-->
                <div class="modal-footer">
                    <div class="d-flex justify-content-end">
                        <button type="button" ng-click="testFunc()" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal-detail_add"><i class="bi bi-display"></i> Preview</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid"><br>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label text-right">ลงทะเบียนโดยใช้ : </label>
                <div class="col">
                    <select class="form-select" ng-model="check.has_reg_by">
                        <option ng-selected="check.has_reg_by == ''">------โปรดระบุ------</option>
                        <option ng-selected="check.has_reg_by == 'emp_id'" value="emp_id">รหัสพนักงาน</option>
                        <option ng-selected="check.has_reg_by == 'card_id'" value="card_id">รหัสบัตรประชาชน</option>
                        <option ng-selected="check.has_reg_by == 'name'" value="name">ชื่อ-สกุล</option>
                        <option ng-selected="check.has_reg_by == 'call'" value="call">เบอร์โทรศัพท์</option>
                        <option ng-selected="check.has_reg_by == 'no'" value="salary">ลำดับที่</option>
                    </select>
                </div>
            </div><br><br><br><br><br>
            <div class="row">
                <div class="d-flex justify-content-end pb-2">
                    <button ng-click="setting_save()" type="button" class="btn btn-success btn-sm"></i>บันทึก</button>
                </div>
            </div>
        </div>
    </div>
    <!-- จบ ตั่งค่าการลงทะเบียน -->
<? } else { ?>
    <meta http-equiv="refresh" content="0;url=index.php?p=event&m=dashboard">
<? } ?>