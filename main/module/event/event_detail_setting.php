<!-- import ctrl -->
<?
$ctrl_name = "event_detail_setting_ctrl";
include("main/controller/$ctrl_name.php");
?>

<? if (isset($_GET["ev_id"])) { ?>
    <!-- bypass angular.js ng-hide -->
    <script>
        const hide_element = (th, id) => {
            // console.log(th.checked);
            if (th.checked) $(`#${id}`).removeClass("ng-hide");
            else $(`#${id}`).addClass("ng-hide");
        }
    </script>
    <!-- end bypass angular.js ng-hide -->

    <style>
        .border {
            border-radius: 20px;
            border: 10px #707B7C;
            padding: 25px;
            background: #F7F9F9;
        }

        #qrcode img {
            width: 200px;
            height: 200px;
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


        <div class="container-fluid">
            <!-- setting -->
            <div class="row">
                <div class="col-6">
                    <div class="form-check form-switch pb-2">
                        <input class="form-check-input" type="checkbox" role="switch" ng-model="check.walk_in" id="check.walk_in" />
                        <label class="form-check-label" for="check.walk_in">เปิดการลงทะเบียนเพิ่มเติม</label>
                    </div>
                    <div class="form-check form-switch pb-2">
                        <input class="form-check-input" type="checkbox" role="switch" ng-model="check.self_reg" id="check.self_reg" />
                        <label class="form-check-label" for="check.self_reg">เปิดการลงทะเบียนด้วยตนเอง</label>
                    </div>
                </div>
                <div class="col-6" ng-show="check.self_reg">
                    <label> ลิงก์สำหรับลงทะเบียนเข้ากิจกรรมด้วยตนเอง :</label>
                    <input disabled type="text" ng-model="link_no_auth" name="link_no_auth" class="form-control">
                    <label> QR Code :</label>
                    <br>
                    <div id="qrcode"></div><br>
                </div>
            </div>
            <!-- end setting -->

            <!--ตารางตัวแปร-->
            <div class="container border">
                <div class="row">
                    <div class="col-md-3 pb-4" ng-click="clickCheckBox('hn')">
                        <input type="checkbox" class="custom-control-input" ng-disabled="!check.walk_in" onchange="hide_element(this,'hn')" ng-model="check.hn" id="check">
                        <label class="custom-control-label" for="customCheck1">HN</label>
                    </div>
                    <div class="col-md-3 pb-4" ng-click="clickCheckBox('emp_id')">
                        <input type="checkbox" class="custom-control-input" ng-disabled="!check.walk_in" onchange="hide_element(this,'emp_id')" ng-model="check.emp_id" id="check">
                        <label class="custom-control-label" for="customCheck1">รหัสพนักงาน</label>
                    </div>
                    <div class="col-md-3 pb-4" ng-click="clickCheckBox('card_id')">
                        <input type="checkbox" class="custom-control-input" ng-disabled="!check.walk_in" onchange="hide_element(this,'card_id')" ng-model="check.card_id" id="check">
                        <label class="custom-control-label" for="customCheck1">รหัสบัตรประชาชน</label>
                    </div>
                    <div class="col-md-3 pb-4" ng-click="clickCheckBox('prefix')">
                        <input type="checkbox" class="custom-control-input" ng-disabled="!check.walk_in" onchange="hide_element(this,'prefix')" ng-model="check.prefix" id="check">
                        <label class="custom-control-label" for="customCheck1">คำนำหน้า</label>
                    </div>
                    <div class="col-md-3 pb-4" ng-click="clickCheckBox('name')">
                        <input type="checkbox" class="custom-control-input" ng-disabled="!check.walk_in" onchange="hide_element(this,'name')" ng-model="check.name" id="check">
                        <label class="custom-control-label" for="customCheck1">ชื่อ</label>
                    </div>
                    <div class="col-md-3 pb-4" ng-click="clickCheckBox('surname')">
                        <input type="checkbox" class="custom-control-input" ng-disabled="!check.walk_in" onchange="hide_element(this,'surname')" ng-model="check.surname" id="check">
                        <label class="custom-control-label" for="customCheck1">นามสกุล</label>
                    </div>
                    <div class="col-md-3 pb-4" ng-click="clickCheckBox('call')">
                        <input type="checkbox" class="custom-control-input" ng-disabled="!check.walk_in" onchange="hide_element(this,'call')" ng-model="check.call" id="check">
                        <label class="custom-control-label" for="customCheck1">เบอร์โทรศัพท์</label>
                    </div>
                    <div class="col-md-3 pb-4" ng-click="clickCheckBox('com_name')">
                        <input type="checkbox" class="custom-control-input" ng-disabled="!check.walk_in" onchange="hide_element(this,'com_name')" ng-model="check.com_name" id="check">
                        <label class="custom-control-label" for="customCheck1">ชื่อบริษัท</label>
                    </div>
                    <div class="col-md-3 pb-4" ng-click="clickCheckBox('dep')">
                        <input type="checkbox" class="custom-control-input" ng-disabled="!check.walk_in" onchange="hide_element(this,'dep')" ng-model="check.dep" id="check">
                        <label class="custom-control-label" for="customCheck1">แผนก</label>
                    </div>
                    <div class="col-md-3 pb-4" ng-click="clickCheckBox('pos')">
                        <input type="checkbox" class="custom-control-input" ng-disabled="!check.walk_in" onchange="hide_element(this,'pos')" ng-model="check.pos" id="check">
                        <label class="custom-control-label" for="customCheck1">ตำแหน่ง</label>
                    </div>
                    <div class="col-md-3 pb-4" ng-click="clickCheckBox('gender')">
                        <input type="checkbox" class="custom-control-input" ng-disabled="!check.walk_in" onchange="hide_element(this,'gender')" ng-model="check.gender" id="check">
                        <label class="custom-control-label" for="customCheck1">เพศ</label>
                    </div>
                    <div class="col-md-3 pb-4" ng-click="clickCheckBox('age')">
                        <input type="checkbox" class="custom-control-input" ng-disabled="!check.walk_in" onchange="hide_element(this,'age')" ng-model="check.age" id="check">
                        <label class="custom-control-label" for="customCheck1">อายุ</label>
                    </div>
                    <div class="col-md-3 pb-4" ng-click="clickCheckBox('birthDate')">
                        <input type="checkbox" class="custom-control-input" ng-disabled="!check.walk_in" onchange="hide_element(this,'birthDate')" ng-model="check.birthDate" id="check">
                        <label class="custom-control-label" for="customCheck1">วันเดือนปีเกิด</label>
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
                        <option ng-selected="check.has_reg_by == 'hn'" value="hn">HN</option>
                        <option ng-selected="check.has_reg_by == 'emp_id'" value="emp_id">รหัสพนักงาน</option>
                        <option ng-selected="check.has_reg_by == 'card_id'" value="card_id">รหัสบัตรประชาชน</option>
                        <option ng-selected="check.has_reg_by == 'name'" value="name">ชื่อ-สกุล</option>
                        <option ng-selected="check.has_reg_by == 'call'" value="call">เบอร์โทรศัพท์</option>
                        <option ng-selected="check.has_reg_by == 'no'" value="no">ลำดับที่</option>
                    </select>
                </div>
            </div><br>
            <div class="row">
                <div class="d-flex justify-content-end pb-2">
                    <button ng-click="setting_save()" type="button" class="btn btn-success btn-sm"></i>บันทึก</button>
                </div>
            </div>
        </div>
    </div>
    <!-- create link and qr_code -->
    <script>
        let link_no_auth = `${location.origin}${location.pathname}?ev_id=<?= $_GET["ev_id"] ?>&no_auth=true`;
        var qrcode = new QRCode(document.getElementById("qrcode"), {
            text: link_no_auth,
            width: 480,
            height: 480,
            colorDark: "#000000",
            colorLight: "#ffffff",
            correctLevel: QRCode.CorrectLevel.H
        });
    </script>
    <!-- end create link and qr_code -->
    <!-- จบ ตั่งค่าการลงทะเบียน -->
<? } else { ?>
    <meta http-equiv="refresh" content="0;url=index.php?p=event&m=dashboard">
<? } ?>