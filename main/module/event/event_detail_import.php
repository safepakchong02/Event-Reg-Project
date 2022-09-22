<!-- import ctrl -->
<?
$ctrl_name = "event_detail_import_ctrl";
include("main/controller/$ctrl_name.php");
?>

<? if (isset($_GET["ev_id"])) { ?>
    <div class="container-fluid" ng-controller="<?= $ctrl_name ?>"><br>
        <div class="row">
            <div class="col-1" style="width: 140px;">
                <a href="index.php?p=event&m=event_detail&ev_id=<?= $_GET["ev_id"] ?>" class="btn btn-primary"><i class="bi bi-caret-left-fill"></i>ย้อนกลับ</a>
            </div>
            <div class="col">
                <h1>นำเข้าข้อมูล</h1>
            </div>
        </div>
        <div class="row">
            <!-- <div class="col-2">
                <label>Upload File :</label>
            </div> -->
            <div class="col-4">
                <input type="file" id="importFile" class="form-control form-control-sm" />
            </div>
            <div class="col-2">
                <button type="button" ng-click="import()" class="btn btn-primary btn-sm"><i class="bi bi-person-plus-fill"></i> Import</button>
            </div>
        </div>
        <br>
        <!-----show table----->
        <div id="table" ng-hide="isInit">
            <table class="table nowrap" style="width:100%">
                <thead>
                    <tr class="table-dark">
                        <th ng-repeat="h in head">{{h}}</th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="row in data">
                        <td ng-repeat="col in row[1]">{{col}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <br>
        <!-----เลือกtype----->
        <div class="container-fluid" id="convert" ng-hide="isInit"><br>
            <div class="row">
                <div class="col-4">ชื่อคอลัมน์ในไฟล์ที่อัปโหลด</div>
                <div class="col-8">แปลงเป็นชื่อที่เราระบุ</div>
            </div>
            <div class="row pb-3">
                <div class="col-4">
                    <input type="text" ng-model="test" name="test" class="form-control" required>
                </div>
                <div class="col-8">
                    <select class="form-control" ng-model="has_col[i]">
                        <option>โปรดระบุ</option>
                        <option>รหัสพนักงาน</option>
                        <option>รหัสบัตรประชาชน</option>
                        <option>ชื่อ-สกุล</option>
                        <option>เบอร์โทรศัพท์</option>
                        <option>ชื่อบริษัท</option>
                        <option>แผนก</option>
                        <option>ตำแหน่ง</option>
                        <option>ลำดับที่</option>
                        <option>เพศ</option>
                        <option>อายุ</option>
                        <option>วันเดือนปีเกิด</option>
                    </select>
                </div>
            </div>
            <br>
            <div class="d-flex justify-content-end pb-2">
                <button ng-click="setting_save()" type="button" class="btn btn-success btn-sm"></i>บันทึก</button>
            </div>
        </div>
    </div>
<? } else { ?>
    <meta http-equiv="refresh" content="0;url=index.php?p=event&m=dashboard">
<? } ?>