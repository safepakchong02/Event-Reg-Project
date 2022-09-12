<!-- import ctrl -->
<?
$ctrl_name = "event_detail_manage_ctrl";
include("main/controller/$ctrl_name.php");
?>

<? if (isset($_GET["ev_id"])) { ?>
    <!-- ข้อมูลผู้ลงทะเบียน -->
    <? $ev_id = $_GET["ev_id"]; ?>
    <div class="col-12 pt-4" ng-controller="<?= $ctrl_name ?>">
        <h1>รายชื่อผู้ลงทะเบียน</h1><br>
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <h3>กิจกรรม : {{ev_title}}</3>
                </div>
                <div class="col-9">
                    <div class="col-12" align="right">
                        <button ng-hide="isInit" type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modal-detail-add">
                            <i class="bi bi-person-plus-fill"></i> เพิ่มรายชื่อ
                        </button>
                        <a href="index.php?p=event&m=event_detail_setting&ev_id=<?= $ev_id ?>" class="btn btn-primary btn-sm">
                            <i class="bi bi-gear-wide-connected"></i> ตั้งค่าการลงทะเบียน
                        </a>
                        <a href="index.php?p=event&m=event_detail_import&ev_id=<?= $ev_id ?>" class="btn btn-primary btn-sm">
                            <i class="bi bi-upload"></i> นำเข้าข้อมูล
                        </a>
                        <a href="index.php?p=event&m=event_detail_export&ev_id=<?= $ev_id ?>" ng-hide="isInit" class="btn btn-info btn-sm ">
                            <i class="bi bi-file-earmark-arrow-up"></i></i> Export
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- แสดงข้อมูล -->
        <!-- data table -->
        <table datatable="ng" id="example" class="table nowrap" style="width:100%">
            <thead>
                <tr class="table-dark">
                    <th ng-show="check.emp_id">รหัสพนักงาน</th>
                    <th ng-show="check.card_id">รหัสบัตรประชาชน</th>
                    <th ng-show="check.name">ชื่อ - สกุล</th>
                    <th ng-show="check.call">เบอร์โทรศัพท์</th>
                    <th ng-show="check.com_name">ชื่อบริษัท</th>
                    <th ng-show="check.dep">แผนก</th>
                    <th ng-show="check.pos">ตำแหน่ง</th>
                    <th ng-show="check.salary">เงินเดือน</th>
                    <th ng-show="check.gender">เพศ</th>
                    <th ng-show="check.age">อายุ</th>
                    <th ng-show="check.birthDate">วันเกิด</th>
                    <th>วันที่เข้าร่วมกิจกรรม</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="row in data_table">
                    <? include("main/module/event/event_detail_edit.php"); ?>
                    <td ng-show="check.emp_id">{{row.emp_id}}</td>
                    <td ng-show="check.card_id">{{row.card_id}}</td>
                    <td ng-show="check.name">{{row.name}}</td>
                    <td ng-show="check.call">{{row.call}}</td>
                    <td ng-show="check.com_name">{{row.com_name}}</td>
                    <td ng-show="check.dep">{{row.dep}}</td>
                    <td ng-show="check.pos">{{row.pos}}</td>
                    <td ng-show="check.salary">{{row.salary}}</td>
                    <td ng-show="check.gender">{{row.gender}}</td>
                    <td ng-show="check.age">{{row.age}}</td>
                    <td ng-show="check.birthDate">{{row.birthDate}}</td>
                    <td>{{checkReg(row.reg_date)}}</td>
                    <td>
                        <button type="button" ng-click="edit_reg_view(row.id)" data-bs-toggle="modal" data-bs-target="#modal-detail_edit" class="btn btn-warning btn-sm">แก้ไข</button>
                        <button type="button" ng-click="del_reg(row.id)" class="btn btn-danger btn-sm">ลบ</button>
                    </td>
                </tr>
            </tbody>
        </table>
        <!-- end data table -->
        <script>
            $(document).ready(function() {
                var table = $('#example').DataTable({
                    scrollX: true,
                    responsive: true,
                    columnDefs: [{
                        responsivePriority: 1,
                        targets: -1
                    }]
                });
            });
        </script>
    </div>
    <!-- จบการแสดงข้อมูล -->
<? } else { ?>
    <meta http-equiv="refresh" content="0;url=index.php?p=event&m=dashboard">
<? } ?>